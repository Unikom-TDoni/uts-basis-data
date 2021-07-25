<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
		]);

		$this->forge->addKey('telp', TRUE);
		$this->forge->createTable('pelanggan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
