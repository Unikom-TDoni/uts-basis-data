<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'username' 	=> 'admin',
			'nama'    	=> 'Admin',
			'id_cabang' => 1,
			'password'  => md5('123')
		];
	
		$this->db->table('users')->insert($data);
	}
}
