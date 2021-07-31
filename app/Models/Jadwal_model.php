<?php namespace App\Models;
use CodeIgniter\Model;
 
class Jadwal_model extends Model
{
    protected $table            = "jadwal";
    protected $primaryKey       = "id_jadwal";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_rute', 'jam_berangkat', 'is_aktif'];


    public function getData($id="")
    {
        $query = $this->select('jadwal.*, f_rute_nama(jadwal.id_rute) as nama_rute, rute.harga_tiket')
                 ->join('rute', 'rute.id_rute = jadwal.id_rute', 'left')
                 ->orderBy('nama_rute, jam_berangkat');

        if(!empty($id))
        {
            $query = $query->where('id_jadwal', $id);
        }

        return $query->get();
    }

    public function setAktivasi($id)
    {
        $query = $this->set('is_aktif', 'IF(is_aktif=1,0,1)', false)
                 ->where('id_jadwal', $id)
                 ->update();

        return $query;
    }

    public function getListJadwalByRute($tgl_berangkat, $id_rute)
    {
        $query = $this->select('
                    jadwal.*,
                    f_rute_nama(jadwal.id_rute) as nama_rute,
                    COUNT(DISTINCT transaksi.nomor_transaksi) as kursi_terisi, 
                    mobil.kapasitas,
                    penjadwalan.id_mobil,
                    IF(penjadwalan.id_mobil!="", CONCAT(mobil.nomor_plat, " (", mobil.merk, ")"), "") as mobil,
                    penjadwalan.id_sopir,
                    IF(penjadwalan.id_sopir!="", sopir.nama, "") as nama_sopir
                ')
                ->join('transaksi', 'transaksi.tgl_berangkat = \''.$tgl_berangkat.'\' AND transaksi.id_jadwal = jadwal.id_jadwal', 'left')
                ->join('penjadwalan', 'penjadwalan.tgl_berangkat = \''.$tgl_berangkat.'\' AND penjadwalan.id_jadwal = jadwal.id_jadwal', 'left')
                ->join('mobil', 'mobil.id_mobil = penjadwalan.id_mobil', 'left')
                ->join('sopir', 'sopir.id_sopir = penjadwalan.id_sopir', 'left')
                ->where('jadwal.id_rute', $id_rute)
                ->where('jadwal.is_aktif', 1)
                ->groupBy('jadwal.id_jadwal')
                ->orderBy('jadwal.jam_berangkat');

        return $query->get();
    }
}
?>