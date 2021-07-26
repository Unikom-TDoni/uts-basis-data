<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [            
			['username' => 'admin', 'nama' => 'Admin', 'id_cabang' => 1, 'level' => 0, 'password' => md5('123')],
			['username' => 'pengadaan', 'nama' => 'Pengadaan', 'id_cabang' => 1, 'level' => 1, 'password' => md5('123')],
			['username' => 'penjadwalan', 'nama' => 'Penjadwalan', 'id_cabang' => 1, 'level' => 2, 'password' => md5('123')],
			['username' => 'kasir', 'nama' => 'Kasir', 'id_cabang' => 1, 'level' => 3, 'password' => md5('123')],
		];
		
		$this->db->table('users')->insertBatch($data);
	}
}
