<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provinsi extends Migration
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
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('provinsi', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('provinsi');
	}
}
