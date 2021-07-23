<?php

namespace App\Controllers;

use App\Models\Users_model;
use App\Models\Provinsi_model;
use App\Models\Kota_model;
use App\Models\Cabang_model;
use App\Models\Rute_model;
use App\Models\Jadwal_model;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->users_model      = new Users_model();
        $this->provinsi_model   = new Provinsi_model();
        $this->kota_model       = new Kota_model();
        $this->cabang_model     = new Cabang_model();
        $this->rute_model       = new Rute_model();
        $this->jadwal_model     = new Jadwal_model();
    }
    
	public function index()
	{
        $data['page']           = 'dashboard';
        $data['jumlah_cabang']  = count($this->cabang_model->findAll());
        $data['jumlah_rute']    = count($this->rute_model->findAll());
        $data['jumlah_jadwal']  = count($this->jadwal_model->findAll());
        $data['jumlah_users']   = count($this->users_model->findAll());

        return view('admin/pages/dashboard', $data);
	}

    public function getListKotaByProvinsi()
	{
        $id_provinsi    = $this->request->getVar('id_provinsi');
        $data           = $this->kota_model->where('id_provinsi', $id_provinsi)->orderBy('nama')->findAll();
        
        echo json_encode($data);
	}

    public function getListCabang()
	{
        $id    = $this->request->getVar('id');
        $data  = $this->cabang_model->getData($id, true)->getResultArray();
        
        echo json_encode($data);
	}

    public function cabang()
	{
        $data['page']       = 'cabang';
        $data['provinsi']   = $this->provinsi_model->orderBy('nama')->findAll();
        $data['cabang']     = $this->cabang_model->getData()->getResultArray();

        return view('admin/pages/cabang', $data);
	}

    public function dataCabang()
	{
        $id_cabang  = $this->request->getVar('id');
        $data       = $this->cabang_model->getData($id_cabang)->getRowArray();

        echo json_encode($data);
	}

    public function saveCabang()
	{
        $id_cabang  = $this->request->getVar('id');

        if(!empty($id_cabang))
        {
            $data['id_cabang'] = $id_cabang;
        }

        $data['nama_cabang']    = $this->request->getVar('nama');
        $data['id_kota']        = $this->request->getVar('kota');
        $data['telp']           = $this->request->getVar('telp');
        $data['alamat']         = $this->request->getVar('alamat');

        $this->cabang_model->save($data);

        return redirect()->to('/admin/cabang');
	}

    public function deleteCabang()
	{
        $id_cabang  = $this->request->getVar('id');
        $this->cabang_model->delete($id_cabang);

        return redirect()->to('/admin/cabang');
	}

    public function rute()
	{
        $data['page']       = 'rute';
        $data['cabang']     = $this->cabang_model->orderBy('nama_cabang')->findAll();
        $data['rute']       = $this->rute_model->getData()->getResultArray();

        return view('admin/pages/rute', $data);
	}

    public function getRute()
	{
        $id     = $this->request->getVar('id');
        $data   = $this->rute_model->getData($id)->getRowArray();

        echo json_encode($data);
	}

    public function saveRute()
	{
        $id = $this->request->getVar('id');

        if(!empty($id))
        {
            $data['id_rute'] = $id;
        }

        $data['id_cabang_asal']    = $this->request->getVar('cabang_asal');
        $data['id_cabang_tujuan']  = $this->request->getVar('cabang_tujuan');
        $data['harga_tiket']       = $this->request->getVar('harga_tiket');
        $data['jarak_tempuh']      = $this->request->getVar('jarak_tempuh');
        $data['waktu_tempuh']      = $this->request->getVar('waktu_tempuh');

        $this->rute_model->save($data);

        return redirect()->to('/admin/rute');
	}

    public function deleteRute()
	{
        $id = $this->request->getVar('id');
        $this->rute_model->delete($id);

        return redirect()->to('/admin/rute');
	}

    public function jadwal()
	{
        $data['page']       = 'jadwal';
        $data['rute']       = $this->rute_model->getData()->getResultArray();
        $data['jadwal']     = $this->jadwal_model->getData()->getResultArray();

        return view('admin/pages/jadwal', $data);
	}

    public function getJadwal()
	{
        $id     = $this->request->getVar('id');
        $data   = $this->jadwal_model->getData($id)->getRowArray();

        echo json_encode($data);
	}

    public function saveJadwal()
	{
        $id = $this->request->getVar('id');

        if(!empty($id))
        {
            $data['id_jadwal'] = $id;
        }

        $data['id_rute']        = $this->request->getVar('rute');
        $data['jam_berangkat']  = $this->request->getVar('jam_berangkat');

        $this->jadwal_model->save($data);

        return redirect()->to('/admin/jadwal');
	}

    public function deleteJadwal()
	{
        $id = $this->request->getVar('id');
        $this->jadwal_model->delete($id);

        return redirect()->to('/admin/jadwal');
	}

    public function users()
	{
        $data['page']       = 'users';
        $data['cabang']     = $this->cabang_model->findAll();
        $data['users']      = $this->users_model->getData()->getResultArray();

        return view('admin/pages/users', $data);
	}

    public function getUsers()
	{
        $username   = $this->request->getVar('username');
        $data       = $this->users_model->getData($username)->getRowArray();

        echo json_encode($data);
	}

    public function saveUsers()
	{
        $username_old   = $this->request->getVar('username_old');
        $username       = $this->request->getVar('username');
        $nama           = $this->request->getVar('nama');
        $cabang         = $this->request->getVar('cabang');
        $password       = $this->request->getVar('password');

        $data_users     = $this->users_model->find($username);
 
        if(!empty($data_users['username']) && ($username_old != $username))
        {
            $ret['status']  = "ERROR";
            $ret['pesan']   = "Username sudah digunakan";
        }
        else
        {
            $data['username']   = $username;
            $data['nama']       = $nama;
            $data['id_cabang']  = $cabang;
            
            if(!empty($password))
            {
                $data['password'] = md5($password);
            }

            if(empty($username_old))
            {
                $this->users_model->insert($data); 
            }
            else
            {
                $this->users_model->update($username_old, $data); 
            }

            $ret['status'] = "OK";
        }

        echo json_encode($ret);
	}

    public function deleteUsers()
	{
        $username = $this->request->getVar('username');
        $this->users_model->delete($username);

        return redirect()->to('/admin/users');
	}

    function ubahPasswordUsers()
    {
        $username       = session()->get('user');
        $old_password   = md5($this->request->getVar('old_password'));
        $password       = md5($this->request->getVar('password'));

        $data_users = $this->users_model->find($username);

        if($data_users['password'] != $old_password)
        {
            $ret['status']  = "ERROR";
            $ret['pesan']   = "Password lama salah!";
        }
        else
        {
            $data['password'] = $password;

            $this->users_model->update($username, $data);     
    
            $ret['status'] = "OK";
        }

        echo json_encode($ret);
    }
}
