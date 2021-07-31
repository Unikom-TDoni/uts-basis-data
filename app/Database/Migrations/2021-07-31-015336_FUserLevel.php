<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FUserLevel extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_user_level(level INT(1)) 
				RETURNS VARCHAR(20)
				DETERMINISTIC
				BEGIN
					DECLARE namaLevel VARCHAR(20);

					IF (level = 0) THEN
						SET namaLevel = 'Admin';
					ELSEIF (level = 1) THEN
						SET namaLevel = 'Pengadaan';
					ELSEIF (level = 2) THEN
						SET namaLevel = 'Penjadwalan';
					ELSEIF (level = 3) THEN
						SET namaLevel = 'Kasir';
					END IF;
					RETURN (namaLevel);
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_user_level");
	}
}
