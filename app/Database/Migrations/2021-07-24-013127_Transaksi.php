<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nomor_transaksi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'tgl_berangkat'       => [
				'type'           => 'DATE'
			],
			'id_jadwal'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'nomor_kursi'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'is_lunas'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
			'waktu_lunas'       => [
				'type'           => 'DATETIME',
				'null' 			 => true,
			],
			'is_batal'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
			'waktu_batal'       => [
				'type'           => 'DATETIME',
				'null' 			 => true,
			],
		]);
		
		$this->forge->addKey('nomor_transaksi', TRUE);
		$this->forge->addForeignKey('id_jadwal','jadwal','id_jadwal','CASCADE','CASCADE');
		$this->forge->addForeignKey('telp','pelanggan','telp','CASCADE','CASCADE');
		$this->forge->createTable('transaksi', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('transaksi');
	}
}
