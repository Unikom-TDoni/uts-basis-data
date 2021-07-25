<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SopirSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['id_sopir' => 1, 'telp' => '08123456789', 'nama' => 'Budi', 'alamat' => 'Bandung', 'nomor_sim' => '307218931289', 'is_aktif' => 1],
			['id_sopir' => 2, 'telp' => '08987654321', 'nama' => 'Agus', 'alamat' => 'Cimahi', 'nomor_sim' => '192837043045', 'is_aktif' => 1],
		];
		
		$this->db->table('sopir')->insertBatch($data);
	}
}
