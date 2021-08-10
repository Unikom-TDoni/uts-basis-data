<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FPelangganNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_pelanggan_nama(no_telp varchar(20))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama_pelanggan varchar(100);
					SELECT nama INTO nama_pelanggan FROM pelanggan WHERE telp = no_telp;
					RETURN nama_pelanggan;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_pelanggan_nama");
	}
}
