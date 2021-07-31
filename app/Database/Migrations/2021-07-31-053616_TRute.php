<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TRute extends Migration
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
		$this->forge->createTable('log_rute', TRUE);

		// ADD TRIGGER INSERT
		$this->db->query("CREATE TRIGGER t_insert_rute 
						  AFTER INSERT ON rute FOR EACH ROW 
						  INSERT INTO log_rute SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_update_rute 
						  AFTER UPDATE ON rute FOR EACH ROW 
						  INSERT INTO log_rute SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_delete_rute 
						  AFTER DELETE ON rute FOR EACH ROW 
						  INSERT INTO log_rute SET action='DELETE DATA', time=NOW();");
	}

	public function down()
	{
		$this->forge->dropTable('log_rute');
		$this->db->query('DROP TRIGGER t_insert_rute;');
		$this->db->query('DROP TRIGGER t_update_rute;');
		$this->db->query('DROP TRIGGER t_delete_rute;');
	}
}
