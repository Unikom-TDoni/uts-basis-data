<?php namespace App\Models;
use CodeIgniter\Model;
 
class Users_model extends Model
{
    protected $table            = "users";
    protected $primaryKey       = "username";
    protected $allowedFields    = ['username', 'nama', 'id_cabang', 'level', 'password'];

    function login($username,$password)
    {
		$query = $this->table('users')->where('username', $username)->where('password', $password);
        return $query;
	}

    public function getData($username="")
    {
        $query = $this->select('users.*, cabang.nama_cabang')
                 ->join('cabang', 'cabang.id_cabang = users.id_cabang', 'left')
                 ->orderBy('nama');

        if(!empty($username))
        {
            $query = $query->where('username', $username);
        }

        return $query->get();
    }
}
?>