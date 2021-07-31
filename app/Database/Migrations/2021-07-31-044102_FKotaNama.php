<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FKotaNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_kota_nama(id_kota int(11))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama_kota varchar(100);
					SELECT nama INTO nama_kota FROM kota WHERE id = id_kota;
					RETURN nama_kota;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_kota_nama");
	}
}
