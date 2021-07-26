<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MobilSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['id_mobil' => 1, 'merk' => 'Hiace', 'nomor_plat' => 'D 1234 ABC', 'tahun' => '2015', 'kapasitas' => 14, 'is_aktif' => 1],
			['id_mobil' => 2, 'merk' => 'Isuzu', 'nomor_plat' => 'D 4311 QQ', 'tahun' => '2012', 'kapasitas' => 11, 'is_aktif' => 1],
		];
		
		$this->db->table('mobil')->insertBatch($data);
	}
}