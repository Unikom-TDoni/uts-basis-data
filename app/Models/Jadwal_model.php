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
        $query = $this->select('jadwal.*, CONCAT(c1.nama_cabang," - ",c2.nama_cabang) as nama_rute, rute.harga_tiket')
                 ->join('rute', 'rute.id_rute = jadwal.id_rute')
                 ->join('cabang as c1', 'c1.id_cabang = rute.id_cabang_asal')
                 ->join('cabang as c2', 'c2.id_cabang = rute.id_cabang_tujuan')
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
        $query = $this->select('jadwal.*, COUNT(transaksi.nomor_transaksi) as kursi_terisi, mobil.kapasitas')
                ->join('transaksi', 'transaksi.tgl_berangkat = \''.$tgl_berangkat.'\' AND transaksi.id_jadwal = jadwal.id_jadwal', 'left')
                ->join('penjadwalan', 'penjadwalan.tgl_berangkat = \''.$tgl_berangkat.'\' AND penjadwalan.id_jadwal = jadwal.id_jadwal', 'left')
                ->join('mobil', 'mobil.id_mobil = penjadwalan.id_mobil', 'left')
                ->where('jadwal.id_rute', $id_rute)
                ->where('jadwal.is_aktif', 1)
                ->orderBy('jadwal.jam_berangkat');

        return $query->get();
    }
}
?>