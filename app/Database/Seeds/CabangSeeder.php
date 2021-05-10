<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CabangSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['id_cabang' => 1, 'nama_cabang' => 'Dipatiukur', 'id_kota' => 3273, 'telp' => '08123456789', 'alamat' => 'Jln. Dipatiukur, Bandung'],
			['id_cabang' => 2, 'nama_cabang' => 'Jatinangor', 'id_kota' => 3211, 'telp' => '08123456789', 'alamat' => 'Jatinangor, Sumedang'],
			['id_cabang' => 3, 'nama_cabang' => 'Pancoran', 'id_kota' => 3173, 'telp' => '08123456789', 'alamat' => 'Pancoran, Jakarta'],
		];
		
		$this->db->table('cabang')->insertBatch($data);
	}
}
