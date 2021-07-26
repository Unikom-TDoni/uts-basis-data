<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mobil extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_mobil'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'merk'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'nomor_plat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			],
			'tahun'       => [
				'type'           => 'YEAR'
			],
			'kapasitas'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'is_aktif'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
		]);

		$this->forge->addKey('id_mobil', TRUE);
		$this->forge->createTable('mobil', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('mobil');
	}
}
