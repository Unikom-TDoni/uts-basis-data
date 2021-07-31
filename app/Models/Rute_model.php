<?php namespace App\Models;
use CodeIgniter\Model;
 
class Rute_model extends Model
{
    protected $table            = "rute";
    protected $primaryKey       = "id_rute";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_cabang_asal', 'id_cabang_tujuan', 'harga_tiket', 'jarak_tempuh', 'waktu_tempuh', 'is_aktif'];

    public function getData($id="", $is_aktif="")
    {
        $query = $this->select('
                    rute.*, 
                    f_rute_nama(id_rute) as nama_rute, 
                    f_cabang_nama(id_cabang_asal) as nama_cabang_asal, 
                    f_cabang_nama(id_cabang_tujuan) as nama_cabang_tujuan,
                    f_kota_nama(c1.id_kota) as kota_asal, 
                    f_kota_nama(c2.id_kota) as kota_tujuan
                 ')
                 ->join('cabang as c1', 'c1.id_cabang = rute.id_cabang_asal', 'left')
                 ->join('cabang as c2', 'c2.id_cabang = rute.id_cabang_tujuan', 'left')
                 ->orderBy('c1.nama_cabang, c2.nama_cabang');

        if(!empty($id))
        {
            $query = $query->where('id_rute', $id);
        }

        if(!empty($is_aktif))
        {
            $query = $query->where('is_aktif', $is_aktif);
        }

        return $query->get();
    }

    public function setAktivasi($id)
    {
        $query = $this->set('is_aktif', 'IF(is_aktif=1,0,1)', false)
                 ->where('id_rute', $id)
                 ->update();

        return $query;
    }

    public function getCabangTujuanRute($id_cabang_asal)
    {
        $query = $this->select('rute.*, id_cabang_tujuan as id_cabang, cabang.nama_cabang')
                 ->join('cabang', 'cabang.id_cabang = rute.id_cabang_tujuan', 'left')
                 ->where('id_cabang_asal', $id_cabang_asal)
                 ->where('is_aktif', 1)
                 ->orderBy('cabang.nama_cabang');

        return $query->get();
    }
}
?>