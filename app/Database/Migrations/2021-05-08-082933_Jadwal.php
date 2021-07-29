<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_jadwal'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'id_rute'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'           => true,
			],
			'jam_berangkat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 5
			],
			'is_aktif'       => [
				'type'           => 'INT',
				'constraint'     => 1
			],
		]);

		$this->forge->addKey('id_jadwal', TRUE);
		$this->forge->addForeignKey('id_rute','rute','id_rute','CASCADE','SET NULL');
		$this->forge->createTable('jadwal', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('jadwal');
	}
}
