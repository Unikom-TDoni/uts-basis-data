<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TSopir extends Migration
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
		$this->forge->createTable('log_sopir', TRUE);

		// ADD TRIGGER INSERT
		$this->db->query("CREATE TRIGGER t_insert_sopir 
						  AFTER INSERT ON sopir FOR EACH ROW 
						  INSERT INTO log_sopir SET action='INSERT DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_update_sopir 
						  AFTER UPDATE ON sopir FOR EACH ROW 
						  INSERT INTO log_sopir SET action='UPDATE DATA', time=NOW();");

		// ADD TRIGGER UPDATE
		$this->db->query("CREATE TRIGGER t_delete_sopir 
						  AFTER DELETE ON sopir FOR EACH ROW 
						  INSERT INTO log_sopir SET action='DELETE DATA', time=NOW();");
	}

	public function down()
	{
		$this->forge->dropTable('log_sopir');
		$this->db->query('DROP TRIGGER t_insert_sopir;');
		$this->db->query('DROP TRIGGER t_update_sopir;');
		$this->db->query('DROP TRIGGER t_delete_sopir;');
	}
}
