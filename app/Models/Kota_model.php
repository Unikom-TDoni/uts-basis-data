<?php namespace App\Models;
use CodeIgniter\Model;
 
class Kota_model extends Model
{
    protected $table        = "kota";
    protected $primaryKey   = "id";

    public function getCabang($id_provinsi)
    {
        $query = $this->select('cabang.*, kota.*, kota.nama AS nama_kota, provinsi.nama AS nama_provinsi')
                 ->join('kota', 'kota.id = cabang.id_kota', 'left')
                 ->join('provinsi', 'provinsi.id = kota.id_provinsi', 'left')
                 ->orderBy('nama_cabang')
                 ->get();

        return $query;
    }
}
?>