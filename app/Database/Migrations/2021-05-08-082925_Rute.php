<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rute extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_rute'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'id_cabang_asal'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			],
			'id_cabang_tujuan'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			],
			'harga_tiket'       => [
				'type'           => 'DOUBLE'
			],
			'jarak_tempuh'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'waktu_tempuh'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'is_aktif'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
		]);

		$this->forge->addKey('id_rute', TRUE);
		$this->forge->addForeignKey('id_cabang_asal','cabang','id_cabang','CASCADE','SET NULL');
		$this->forge->addForeignKey('id_cabang_tujuan','cabang','id_cabang','CASCADE','SET NULL');
		$this->forge->createTable('rute', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('rute');
	}
}
