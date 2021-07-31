<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FSopirNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_sopir_nama(id int(11))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama_sopir varchar(100);
					SELECT nama INTO nama_sopir FROM sopir WHERE id_sopir = id;
					RETURN nama_sopir;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_sopir_nama");
	}
}
