<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sopir extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sopir'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'alamat'       => [
				'type'           => 'TEXT'
			],
			'nomor_sim'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'is_aktif'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
		]);

		$this->forge->addKey('id_sopir', TRUE);
		$this->forge->createTable('sopir', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('sopir');
	}
}
