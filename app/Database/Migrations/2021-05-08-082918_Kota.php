<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kota extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'id_provinsi'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('id_provinsi','provinsi','id');
		$this->forge->createTable('kota', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('kota');
	}
}
