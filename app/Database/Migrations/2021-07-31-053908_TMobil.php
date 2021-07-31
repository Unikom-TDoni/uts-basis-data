<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TMobil extends Migration
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
		$this->forge->createTable('log_mobil', TRUE);

		// ADD TRIGGER INSERT
		$this->db->query("CREATE TRIGGER t_insert_mobil 
						  AFTER INSERT ON mobil FOR EACH ROW 
						  INSERT INTO log_mobil SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_update_mobil 
						  AFTER UPDATE ON mobil FOR EACH ROW 
						  INSERT INTO log_mobil SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_delete_mobil 
						  AFTER DELETE ON mobil FOR EACH ROW 
						  INSERT INTO log_mobil SET action='DELETE DATA', time=NOW();");
	}

	public function down()
	{
		$this->forge->dropTable('log_mobil');
		$this->db->query('DROP TRIGGER t_insert_mobil;');
		$this->db->query('DROP TRIGGER t_update_mobil;');
		$this->db->query('DROP TRIGGER t_delete_mobil;');
	}
}
