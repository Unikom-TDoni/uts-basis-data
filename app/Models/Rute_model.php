<?php namespace App\Models;
use CodeIgniter\Model;
 
class Rute_model extends Model
{
    protected $table            = "rute";
    protected $primaryKey       = "id_rute";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_cabang_asal', 'id_cabang_tujuan', 'jarak_tempuh', 'waktu_tempuh'];


    public function getData($id="")
    {
        $query = $this->select('rute.*, CONCAT(c1.nama_cabang," - ",c2.nama_cabang) as nama_rute, c1.nama_cabang as nama_cabang_asal, c2.nama_cabang as nama_cabang_tujuan, k1.nama as kota_asal, k2.nama as kota_tujuan')
                 ->join('cabang as c1', 'c1.id_cabang = rute.id_cabang_asal')
                 ->join('cabang as c2', 'c2.id_cabang = rute.id_cabang_tujuan')
                 ->join('kota as k1', 'k1.id = c1.id_kota')
                 ->join('kota as k2', 'k2.id = c2.id_kota')
                 ->orderBy('c1.nama_cabang, c2.nama_cabang');

        if(!empty($id))
        {
            $query = $query->where('id_rute', $id);
        }

        return $query->get();
    }
}
?>