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
				'constraint'     => 11
			],
			'id_mobil'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'id_sopir'       => [
				'type'           => 'INT',
				'constraint'     => 11
			]
		]);
		
		$this->forge->addKey('id_penjadwalan', TRUE);
		$this->forge->addForeignKey('id_jadwal','jadwal','id_jadwal');
		$this->forge->addForeignKey('id_mobil','mobil','id_mobil');
		$this->forge->addForeignKey('id_sopir','sopir','id_sopir');
		$this->forge->createTable('penjadwalan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('penjadwalan');
	}
}
