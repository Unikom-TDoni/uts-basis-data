<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjadwalan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_penjadwalan'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'tgl_berangkat'       => [
				'type'           => 'DATE'
			],
			'id_jadwal'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			],
			'id_mobil'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			],
			'id_sopir'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			]
		]);
		
		$this->forge->addKey('id_penjadwalan', TRUE);
		$this->forge->addForeignKey('id_jadwal','jadwal','id_jadwal','CASCADE','SET NULL');
		$this->forge->addForeignKey('id_mobil','mobil','id_mobil','CASCADE','SET NULL');
		$this->forge->addForeignKey('id_sopir','sopir','id_sopir','CASCADE','SET NULL');
		$this->forge->createTable('penjadwalan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('penjadwalan');
	}
}
