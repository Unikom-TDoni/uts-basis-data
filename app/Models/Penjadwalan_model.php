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
					CONCAT(mobil.nomor_plat, " (", mobil.merk, ")") AS mobil, 
					mobil.kapasitas,
					sopir.nama AS nama_sopir
				 ')
                 ->join('mobil', 'mobil.id_mobil = penjadwalan.id_mobil')
                 ->join('sopir', 'sopir.id_sopir = penjadwalan.id_sopir')
                 ->where('penjadwalan.tgl_berangkat', $tgl_berangkat)
				 ->where('penjadwalan.id_jadwal', $id_jadwal);

        return $query->get();
    }

}
