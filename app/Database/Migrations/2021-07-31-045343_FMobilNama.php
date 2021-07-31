<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FMobilNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_mobil_nama(id int(11))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama varchar(100);
					SELECT CONCAT(mobil.nomor_plat, ' (', mobil.merk, ')') INTO nama FROM mobil WHERE id_mobil = id;
					RETURN nama;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_mobil_nama");
	}
}
