<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
        $this->call('UsersSeeder');
        $this->call('ProvinsiSeeder');
		$this->call('KotaSeeder');
		$this->call('CabangSeeder');
		$this->call('RuteSeeder');
		$this->call('JadwalSeeder');
	}
}
