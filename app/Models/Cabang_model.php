<?php namespace App\Models;
use CodeIgniter\Model;
 
class Cabang_model extends Model
{
    protected $table            = "cabang";
    protected $primaryKey       = "id_cabang";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_cabang', 'id_kota', 'telp', 'alamat'];

    public function getData($id="", $exclude=false)
    {
        $query = $this->select('cabang.*, f_kota_nama(id_kota) AS nama_kota, f_provinsi_nama(id_provinsi) AS nama_provinsi')
                 ->join('kota', 'kota.id = cabang.id_kota', 'left')
                 ->orderBy('nama_cabang');

        if(!empty($id))
        {
            if(!$exclude)
            {
                $query = $query->where('id_cabang', $id);
            }
            else
            {
                $query = $query->where('id_cabang !=', $id);
            }
        }

        return $query->get();
    }
}
?>