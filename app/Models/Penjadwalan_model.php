<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjadwalan_model extends Model
{
	protected $table        	= "penjadwalan";
    protected $primaryKey       = "id_penjadwalan";
    protected $useAutoIncrement = true;
	protected $allowedFields    = ['tgl_berangkat', 'id_jadwal', 'id_mobil', 'id_sopir'];

    public function getData($tgl_berangkat, $id_jadwal)
    {
        $query = $this->select(
					'penjadwalan.*,
					f_mobil_nama(penjadwalan.id_mobil) AS mobil, 
					mobil.kapasitas,
					f_sopir_nama(penjadwalan.id_sopir) AS nama_sopir
				 ')
                 ->join('mobil', 'mobil.id_mobil = penjadwalan.id_mobil', 'left')
                 ->where('penjadwalan.tgl_berangkat', $tgl_berangkat)
				 ->where('penjadwalan.id_jadwal', $id_jadwal);

        return $query->get();
    }

}
