<?php 

namespace App\Controllers;
  
use App\Models\Users_model;
  
class Auth extends BaseController
{
    protected $helper = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->session = session();
        $this->users_model = new Users_model();
    }
 
    public function login()
    {
        if(!$this->session->has('user'))
		{
            return view('admin/login');
        }
		else
		{
            return redirect()->to('/admin');
        }
    }
 
    public function proses_login()
    {
        $username   = $this->request->getVar('username');
        $password   = md5($this->request->getVar('password'));

        $cek = $this->users_model->login($username, $password)->countAllResults();

		if ($cek > 0)
		{
            $data_user = $this->users_model->find($username);
            $arr_level = array('Admin', 'Pengadaan', 'Penjadwalan', 'Kasir');

			$this->session->set('user', $username);
			$this->session->set('nama', $data_user['nama']);
			$this->session->set('level', $data_user['level']);
			$this->session->set('nama_level', $arr_level[$data_user['level']]);

            return redirect()->to('/admin');
 		}
		else
		{
            $this->session->setFlashdata('pesan', 'Username / Password Salah!');
            return redirect()->to('/login');
 		}
    }
 
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}