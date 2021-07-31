<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FRuteNama extends Migration
{
	public function up()
	{
		$sql = "CREATE FUNCTION f_rute_nama(id int(11))
				RETURNS varchar(100)
				DETERMINISTIC
				BEGIN
					DECLARE nama varchar(100);
						SELECT CONCAT(c1.nama_cabang, ' - ', c2.nama_cabang) INTO nama FROM rute 
						JOIN cabang c1 ON c1.id_cabang = rute.id_cabang_asal
						JOIN cabang c2 ON c2.id_cabang = rute.id_cabang_tujuan
						WHERE id_rute = id;
					RETURN nama;
				END";
		
		$this->db->query($sql);
	}

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS f_rute_nama");
	}
}
