<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TCabang extends Migration
{
	public function up()
	{
		// ADD TABLE LOG CABANG
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
		$this->forge->createTable('log_cabang', TRUE);

		// ADD TRIGGER INSERT CABANG
		$this->db->query("CREATE TRIGGER t_insert_cabang 
						  AFTER INSERT ON cabang FOR EACH ROW 
						  INSERT INTO log_cabang SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE CABANG
		$this->db->query("CREATE TRIGGER t_update_cabang 
						  AFTER UPDATE ON cabang FOR EACH ROW 
						  INSERT INTO log_cabang SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE CABANG
		$this->db->query("CREATE TRIGGER t_delete_cabang 
						  AFTER DELETE ON cabang FOR EACH ROW 
						  INSERT INTO log_cabang SET action='DELETE DATA', time=NOW();");
	}  

	public function down()
	{
		$this->forge->dropTable('log_cabang');
		$this->db->query('DROP TRIGGER t_insert_cabang;');
		$this->db->query('DROP TRIGGER t_update_cabang;');
		$this->db->query('DROP TRIGGER t_delete_cabang;');
	}
}
