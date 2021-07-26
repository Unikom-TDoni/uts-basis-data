<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cabang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_cabang'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'nama_cabang'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'id_kota'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 15
			],
			'alamat'       => [
				'type'           => 'TEXT',
				'default'     	 => null
			],
		]);

		$this->forge->addKey('id_cabang', TRUE);
		$this->forge->addForeignKey('id_kota','kota','id');
		$this->forge->createTable('cabang', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('cabang');
	}
}
