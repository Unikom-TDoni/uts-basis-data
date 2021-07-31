<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TJadwal extends Migration
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
		$this->forge->createTable('log_jadwal', TRUE);

		// ADD TRIGGER INSERT
		$this->db->query("CREATE TRIGGER t_insert_jadwal 
						  AFTER INSERT ON jadwal FOR EACH ROW 
						  INSERT INTO log_jadwal SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_update_jadwal 
						  AFTER UPDATE ON jadwal FOR EACH ROW 
						  INSERT INTO log_jadwal SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_delete_jadwal 
						  AFTER DELETE ON jadwal FOR EACH ROW 
						  INSERT INTO log_jadwal SET action='DELETE DATA', time=NOW();");
	}

	public function down()
	{
		$this->forge->dropTable('log_jadwal');
		$this->db->query('DROP TRIGGER t_insert_jadwal;');
		$this->db->query('DROP TRIGGER t_update_jadwal;');
		$this->db->query('DROP TRIGGER t_delete_jadwal;');
	}
}
