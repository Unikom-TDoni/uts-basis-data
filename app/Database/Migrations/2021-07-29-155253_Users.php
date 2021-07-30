<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'id_cabang'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'level'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'password' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
		]);

		$this->forge->addKey('username', TRUE);
		$this->forge->addForeignKey('id_cabang','cabang','id_cabang','CASCADE','CASCADE');
		$this->forge->createTable('users', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
