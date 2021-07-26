<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['id_jadwal' => 1, 'id_rute' => 1, 'jam_berangkat' => '06:00', 'is_aktif' => 1],
			['id_jadwal' => 2, 'id_rute' => 1, 'jam_berangkat' => '18:00', 'is_aktif' => 1],
			['id_jadwal' => 3, 'id_rute' => 2, 'jam_berangkat' => '05:00', 'is_aktif' => 1],
			['id_jadwal' => 4, 'id_rute' => 2, 'jam_berangkat' => '16:00', 'is_aktif' => 1],
			['id_jadwal' => 5, 'id_rute' => 3, 'jam_berangkat' => '07:30', 'is_aktif' => 1],
			['id_jadwal' => 6, 'id_rute' => 3, 'jam_berangkat' => '19:00', 'is_aktif' => 1],
			['id_jadwal' => 7, 'id_rute' => 4, 'jam_berangkat' => '08:00', 'is_aktif' => 1],
			['id_jadwal' => 8, 'id_rute' => 4, 'jam_berangkat' => '15:30', 'is_aktif' => 1],			
			['id_jadwal' => 9, 'id_rute' => 5, 'jam_berangkat' => '10:00', 'is_aktif' => 1],
			['id_jadwal' => 10, 'id_rute' => 5, 'jam_berangkat' => '20:00', 'is_aktif' => 1],
			['id_jadwal' => 11, 'id_rute' => 6, 'jam_berangkat' => '12:00', 'is_aktif' => 1],
			['id_jadwal' => 12, 'id_rute' => 6, 'jam_berangkat' => '21:00', 'is_aktif' => 1],
		];
		
		$this->db->table('jadwal')->insertBatch($data);
	}
}
