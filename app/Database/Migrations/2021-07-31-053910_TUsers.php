<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsers extends Migration
{
	public function up()
	{
		// ADD TABLE LOG
		$this->forge->addField([
			'id'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true
			],
			'action'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'time'       => [
				'type'           => 'DATETIME'
			],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('log_users', TRUE);

		// ADD TRIGGER INSERT
		$this->db->query("CREATE TRIGGER t_insert_users 
						  AFTER INSERT ON users FOR EACH ROW 
						  INSERT INTO log_users SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_update_users 
						  AFTER UPDATE ON users FOR EACH ROW 
						  INSERT INTO log_users SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_delete_users 
						  AFTER DELETE ON users FOR EACH ROW 
						  INSERT INTO log_users SET action='DELETE DATA', time=NOW();");
	}

	public function down()
	{
		$this->forge->dropTable('log_users');
		$this->db->query('DROP TRIGGER t_insert_users;');
		$this->db->query('DROP TRIGGER t_update_users;');
		$this->db->query('DROP TRIGGER t_delete_users;');
	}
}
