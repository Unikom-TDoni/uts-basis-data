<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FCabangNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_cabang_nama(id int(11))
				RETURNS varchar(50)
				DETERMINISTIC
				BEGIN
					DECLARE nama varchar(50);
					SELECT nama_cabang INTO nama FROM cabang WHERE id_cabang = id;
					RETURN nama;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_cabang_nama");
	}
}
