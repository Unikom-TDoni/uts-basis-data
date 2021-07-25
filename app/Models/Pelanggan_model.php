<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model
{
	protected $table            = "pelanggan";
    protected $primaryKey       = "telp";
    protected $allowedFields    = ['telp', 'nama'];
}
