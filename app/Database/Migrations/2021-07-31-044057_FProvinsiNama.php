<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FProvinsiNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_provinsi_nama(id_prov int(11))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama_prov varchar(100);
					SELECT nama INTO nama_prov FROM provinsi WHERE id = id_prov;
					RETURN nama_prov;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_provinsi_nama");
	}
}
