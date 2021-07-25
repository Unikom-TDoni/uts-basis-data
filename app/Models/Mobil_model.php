<?php

namespace App\Models;

use CodeIgniter\Model;

class Mobil_model extends Model
{
	protected $table            = "mobil";
    protected $primaryKey       = "id_mobil";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['merk', 'nomor_plat', 'tahun', 'kapasitas', 'is_aktif'];

    public function setAktivasi($id)
    {
        $query = $this->set('is_aktif', 'IF(is_aktif=1,0,1)', false)
                 ->where('id_mobil', $id)
                 ->update();

        return $query;
    }

    public function getKapasitasDefault()
    {
        return $kapasitas_default = 14;
    }
}
