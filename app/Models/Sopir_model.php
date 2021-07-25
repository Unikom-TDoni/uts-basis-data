<?php

namespace App\Models;

use CodeIgniter\Model;

class Sopir_model extends Model
{
	protected $table            = "sopir";
    protected $primaryKey       = "id_sopir";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['telp', 'nama', 'alamat', 'nomor_sim', 'is_aktif'];

    public function setAktivasi($id)
    {
        $query = $this->set('is_aktif', 'IF(is_aktif=1,0,1)', false)
                 ->where('id_sopir', $id)
                 ->update();

        return $query;
    }
}
