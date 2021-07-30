<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_model extends Model
{
    protected $table            = "transaksi";
    protected $primaryKey       = "nomor_transaksi";
    protected $allowedFields    = ['nomor_transaksi', 'tgl_berangkat', 'id_jadwal', 'telp', 'nomor_kursi', 'is_lunas', 'waktu_lunas', 'is_batal', 'waktu_batal'];

	public function generateNomorTransaksi($tgl_berangkat)
    {
        $data = $this->select('*')
				->where('tgl_berangkat', $tgl_berangkat)
				->orderBy('nomor_transaksi', 'DESC')
				->get()
                ->getRowArray();

        $tgl = date("ymd", strtotime($tgl_berangkat));
		
        if(isset($data['nomor_transaksi']))
        {
            $last_code      	= $data['nomor_transaksi'];
            $lastIncrement 		= substr($last_code, -3);
            $nomor_transaksi 	= 'T' . date('ymd') . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }
        else
        {
            $nomor_transaksi = "T" . $tgl . "001";
        }

        return $nomor_transaksi;
    }

    public function getListData($tgl_awal, $tgl_akhir, $filter=0, $id_jadwal="")
    {
        $query = $this->select(
                    'transaksi.*,
                    IF(is_batal=1, "CANCELLED", IF(is_lunas=1, "PAID", "BOOKED")) as status, 
                    jadwal.*, 
                    pelanggan.*, 
                    CONCAT(c1.nama_cabang," - ",c2.nama_cabang) as nama_rute, 
                    rute.harga_tiket'
                 )
                 ->join('jadwal', 'jadwal.id_jadwal = transaksi.id_jadwal')
                 ->join('rute', 'rute.id_rute = jadwal.id_rute')
                 ->join('cabang as c1', 'c1.id_cabang = rute.id_cabang_asal')
                 ->join('cabang as c2', 'c2.id_cabang = rute.id_cabang_tujuan')
                 ->join('pelanggan', 'pelanggan.telp = transaksi.telp')
                 ->where('tgl_berangkat >=', $tgl_awal)
                 ->where('tgl_berangkat <=', $tgl_akhir)
                 ->orderBy('nomor_transaksi');

        switch($filter)
        {
            case 0:
                // SEMUA TRANSAKSI
                $query = $query;
            break;

            case 1:
                // TRANSAKSI DIBAYAR
                $query = $query->where('transaksi.is_lunas', 1)
                         ->where('transaksi.is_batal', 0);
            break;
            
            case 2:
                // TRANSAKSI BELUM DIBAYAR
                $query = $query->where('transaksi.is_lunas', 0)
                         ->where('transaksi.is_batal', 0);
            break;
            
            case 3:
                // TRANSAKSI BATAL
                $query = $query->where('transaksi.is_batal', 1);
            break;

            case 4:
                // SEMUA TRANSAKSI KECUALI BATAL
                $query = $query->where('transaksi.is_batal', 0);
            break;
        }

        if(!empty($id_jadwal))
        {
            $query = $query->where('transaksi.id_jadwal', $id_jadwal);
        }

        return $query->get();
    }

    public function getData($nomor_transaksi)
    {
        $query = $this->select(
                    'transaksi.*,
                    IF(is_batal=1, "CANCELLED", IF(is_lunas=1, "PAID", "BOOKED")) as status, 
                    jadwal.*, 
                    pelanggan.*,
                    CONCAT(c1.nama_cabang, " (", k1.nama, ")") as cabang_asal,
                    CONCAT(c2.nama_cabang, " (", k2.nama, ")") as cabang_tujuan,
                    CONCAT(c1.nama_cabang," - ",c2.nama_cabang) as nama_rute, 
                    rute.harga_tiket,
                    IF(penjadwalan.id_mobil!="", CONCAT(mobil.nomor_plat, " (", mobil.merk, ")"), "-") as mobil,
                    IF(penjadwalan.id_sopir!="", sopir.nama, "-") as nama_sopir'
                 )
                 ->join('jadwal', 'jadwal.id_jadwal = transaksi.id_jadwal', 'left')
                 ->join('rute', 'rute.id_rute = jadwal.id_rute', 'left')
                 ->join('cabang as c1', 'c1.id_cabang = rute.id_cabang_asal', 'left')
                 ->join('kota as k1', 'k1.id = c1.id_kota', 'left')
                 ->join('cabang as c2', 'c2.id_cabang = rute.id_cabang_tujuan', 'left')
                 ->join('kota as k2', 'k2.id = c2.id_kota', 'left')
                 ->join('pelanggan', 'pelanggan.telp = transaksi.telp', 'left')
                 ->join('penjadwalan', 'penjadwalan.tgl_berangkat = transaksi.tgl_berangkat AND penjadwalan.id_jadwal = transaksi.id_jadwal', 'left')
                 ->join('mobil', 'mobil.id_mobil = penjadwalan.id_mobil', 'left')
                 ->join('sopir', 'sopir.id_sopir = penjadwalan.id_sopir', 'left')
                 ->where('nomor_transaksi', $nomor_transaksi);

        return $query->get();
    }
}
