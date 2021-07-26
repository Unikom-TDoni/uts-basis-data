<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RuteSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['id_rute' => 1, 'id_cabang_asal' => 1, 'id_cabang_tujuan' => 2, 'harga_tiket' => 25000, 'jarak_tempuh' => 20, 'waktu_tempuh' => 60, 'is_aktif' => 1],
			['id_rute' => 2, 'id_cabang_asal' => 1, 'id_cabang_tujuan' => 3, 'harga_tiket' => 80000, 'jarak_tempuh' => 100, 'waktu_tempuh' => 180, 'is_aktif' => 1],
			['id_rute' => 3, 'id_cabang_asal' => 2, 'id_cabang_tujuan' => 1, 'harga_tiket' => 25000, 'jarak_tempuh' => 20, 'waktu_tempuh' => 60, 'is_aktif' => 1],
			['id_rute' => 4, 'id_cabang_asal' => 2, 'id_cabang_tujuan' => 3, 'harga_tiket' => 10000, 'jarak_tempuh' => 120, 'waktu_tempuh' => 240, 'is_aktif' => 1],
			['id_rute' => 5, 'id_cabang_asal' => 3, 'id_cabang_tujuan' => 1, 'harga_tiket' => 80000, 'jarak_tempuh' => 100, 'waktu_tempuh' => 180, 'is_aktif' => 1],
			['id_rute' => 6, 'id_cabang_asal' => 3, 'id_cabang_tujuan' => 2, 'harga_tiket' => 10000, 'jarak_tempuh' => 120, 'waktu_tempuh' => 240, 'is_aktif' => 1],
		];
		
		$this->db->table('rute')->insertBatch($data);
	}
}
