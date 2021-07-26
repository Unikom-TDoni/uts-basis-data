<?php

namespace App\Controllers;

use App\Models\Users_model;
use App\Models\Provinsi_model;
use App\Models\Kota_model;
use App\Models\Cabang_model;
use App\Models\Rute_model;
use App\Models\Jadwal_model;
use App\Models\Mobil_model;
use App\Models\Sopir_model;
use App\Models\Pelanggan_model;
use App\Models\Transaksi_model;
use App\Models\Penjadwalan_model;
use TCPDF;
class Admin extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        helper(['form']);
        $this->users_model          = new Users_model();
        $this->provinsi_model       = new Provinsi_model();
        $this->kota_model           = new Kota_model();
        $this->cabang_model         = new Cabang_model();
        $this->rute_model           = new Rute_model();
        $this->jadwal_model         = new Jadwal_model();
        $this->mobil_model          = new Mobil_model();
        $this->sopir_model          = new Sopir_model();
        $this->pelanggan_model      = new Pelanggan_model();
        $this->transaksi_model      = new Transaksi_model();
        $this->penjadwalan_model    = new Penjadwalan_model();
    }
    
	public function index()
	{
        $data['page']               = 'dashboard';
        $data['jumlah_cabang']      = count($this->cabang_model->findAll());
        $data['jumlah_rute']        = count($this->rute_model->findAll());
        $data['jumlah_jadwal']      = count($this->jadwal_model->findAll());
        $data['jumlah_users']       = count($this->users_model->findAll());
        $data['jumlah_mobil']       = count($this->mobil_model->findAll());
        $data['jumlah_sopir']       = count($this->sopir_model->findAll());
        $data['jumlah_pelanggan']   = count($this->pelanggan_model->findAll());
        $data['transaksi']          = $this->transaksi_model->getListData(date('Y-m-d'), date('Y-m-d'), 0)->getResultArray();
        $data['jumlah_transaksi']   = count($data['transaksi']);
        $data['level']              = session()->get('level');
        
        if($data['level'] == 0)
        {
            $data['width_lg'] = 3;
        }
        elseif($data['level'] == 1 || $data['level'] == 3)
        {
            $data['width_lg'] = 6;
        }
        else
        {
            $data['width_lg'] = 4;
        }

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
        $data['is_aktif']          = $this->request->getVar('is_aktif');

        $this->rute_model->save($data);

        return redirect()->to('/admin/rute');
	}

    public function deleteRute()
	{
        $id = $this->request->getVar('id');
        $this->rute_model->delete($id);

        return redirect()->to('/admin/rute');
	}

    public function setAktivasiRute()
    {
        $id = $this->request->getVar('id');
        $this->rute_model->setAktivasi($id);

        return redirect()->to('/admin/rute');
    }

    public function jadwal()
	{
        $data['page']       = 'jadwal';
        $data['rute']       = $this->rute_model->getData('', 1)->getResultArray();
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
        $data['is_aktif']       = $this->request->getVar('is_aktif');

        $this->jadwal_model->save($data);

        return redirect()->to('/admin/jadwal');
	}

    public function deleteJadwal()
	{
        $id = $this->request->getVar('id');
        $this->jadwal_model->delete($id);

        return redirect()->to('/admin/jadwal');
	}
    
    public function setAktivasiJadwal()
    {
        $id = $this->request->getVar('id');
        $this->jadwal_model->setAktivasi($id);

        return redirect()->to('/admin/jadwal');
    }
    
    public function mobil()
	{
        $data['page']   = 'mobil';
        $data['mobil']  = $this->mobil_model->findAll();

        return view('admin/pages/mobil', $data);
	}

    public function getMobil()
	{
        $id     = $this->request->getVar('id');
        $data   = $this->mobil_model->find($id);

        echo json_encode($data);
	}

    public function saveMobil()
	{
        $id = $this->request->getVar('id');

        if(!empty($id))
        {
            $data['id_mobil'] = $id;
        }

        $data['merk']       = $this->request->getVar('merk');
        $data['nomor_plat'] = $this->request->getVar('nomor_plat');
        $data['tahun']      = $this->request->getVar('tahun');
        $data['kapasitas']  = $this->request->getVar('kapasitas');
        $data['is_aktif']   = $this->request->getVar('is_aktif');

        $this->mobil_model->save($data);

        return redirect()->to('/admin/mobil');
	}

    public function deleteMobil()
	{
        $id = $this->request->getVar('id');
        $this->mobil_model->delete($id);

        return redirect()->to('/admin/mobil');
	}

    public function setAktivasiMobil()
    {
        $id = $this->request->getVar('id');
        $this->mobil_model->setAktivasi($id);

        return redirect()->to('/admin/mobil');
    }

    public function sopir()
	{
        $data['page']   = 'sopir';
        $data['sopir']  = $this->sopir_model->findAll();

        return view('admin/pages/sopir', $data);
	}

    public function getSopir()
	{
        $id     = $this->request->getVar('id');
        $data   = $this->sopir_model->find($id);

        echo json_encode($data);
	}

    public function saveSopir()
	{
        $id = $this->request->getVar('id');

        if(!empty($id))
        {
            $data['id_sopir'] = $id;
        }

        $data['telp']       = $this->request->getVar('telp');
        $data['nama']       = $this->request->getVar('nama');
        $data['alamat']     = $this->request->getVar('alamat');
        $data['nomor_sim']  = $this->request->getVar('nomor_sim');
        $data['is_aktif']   = $this->request->getVar('is_aktif');

        $this->sopir_model->save($data);

        return redirect()->to('/admin/sopir');
	}

    public function deleteSopir()
	{
        $id = $this->request->getVar('id');
        $this->sopir_model->delete($id);

        return redirect()->to('/admin/sopir');
	}

    public function setAktivasiSopir()
    {
        $id = $this->request->getVar('id');
        $this->sopir_model->setAktivasi($id);

        return redirect()->to('/admin/sopir');
    }

    public function pelanggan()
	{
        $data['page']       = 'pelanggan';
        $data['pelanggan']  = $this->pelanggan_model->findAll();

        return view('admin/pages/pelanggan', $data);
	}

    public function getPelanggan()
	{
        $telp           = $this->request->getVar('telp');
        $arr_pelanggan  = $this->pelanggan_model->find($telp);
        $data           = array('nama' => isset($arr_pelanggan['nama'])?$arr_pelanggan['nama']:'');

        echo json_encode($data);
	}

    public function savePelanggan($telp, $nama)
	{
        $data_pelanggan = $this->pelanggan_model->find($telp);
        
        if(!isset($data_pelanggan))
        {
            $data['telp'] = $telp;
            $data['nama'] = $nama;
    
            $this->pelanggan_model->insert($data);
        }

        return true;
	}

    public function listTransaksi()
	{
        $data['page']           = 'list_transaksi';
        $data['tgl_awal']       = !empty($this->request->getVar('tgl_awal'))?$this->request->getVar('tgl_awal'):date('Y-m-d');
        $data['tgl_akhir']      = !empty($this->request->getVar('tgl_akhir'))?$this->request->getVar('tgl_akhir'):date('Y-m-d');
        $data['filter']         = !empty($this->request->getVar('filter'))?$this->request->getVar('filter'):0;
        $data['transaksi']      = $this->transaksi_model->getListData($data['tgl_awal'], $data['tgl_akhir'], $data['filter'])->getResultArray();

        return view('admin/pages/transaksi_list', $data);
	}

    public function addTransaksi()
	{
        $data['page']           = 'add_transaksi';
        $data['tgl_berangkat']  = !empty($this->request->getVar('tgl_berangkat'))?$this->request->getVar('tgl_berangkat'):date('Y-m-d');
        $data['cabang_asal']    = !empty($this->request->getVar('cabang_asal'))?$this->request->getVar('cabang_asal'):"";
        $data['rute']           = !empty($this->request->getVar('rute'))?$this->request->getVar('rute'):"";
        $data['jadwal']         = !empty($this->request->getVar('jadwal'))?$this->request->getVar('jadwal'):"";
        $data['cabang']         = $this->cabang_model->orderBy('nama_cabang')->findAll();
        $data['mobil']          = $this->mobil_model->where('is_aktif', 1)->findAll();
        $data['sopir']          = $this->sopir_model->where('is_aktif', 1)->findAll();
        
        return view('admin/pages/transaksi_add', $data);
	}

    public function getTransaksi()
	{
        $nomor_transaksi    = $this->request->getVar('nomor_transaksi');
        $arr_transaksi      = $this->transaksi_model->getData($nomor_transaksi)->getRowArray();

        $data                   = $arr_transaksi;
        $data['harga_tiket']    = 'Rp ' . number_format($arr_transaksi['harga_tiket'], 0, ",", ".");

        echo json_encode($data);
	}
    
    public function saveTransaksi()
	{
        $tgl_berangkat  = $this->request->getVar('tgl_berangkat');
        $id_jadwal      = $this->request->getVar('id_jadwal');
        $telp           = $this->request->getVar('telp');
        $nama           = $this->request->getVar('nama');
        $nomor_kursi    = $this->request->getVar('nomor_kursi');
      
        $data['nomor_transaksi']    = $this->transaksi_model->generateNomorTransaksi($tgl_berangkat);
        $data['tgl_berangkat']      = $tgl_berangkat;
        $data['id_jadwal']          = $id_jadwal;
        $data['telp']               = $telp;
        $data['nomor_kursi']        = $nomor_kursi;
        $data['is_lunas']           = 0;
        $data['waktu_lunas']        = null;
        $data['is_batal']           = 0;
        $data['waktu_batal']        = null;
       
        $this->savePelanggan($telp, $nama);
        $this->transaksi_model->insert($data);

        $ret['status']  = "OK";
        $ret['message'] = "Transaksi Berhasil Disimpan!";

        echo json_encode($ret);
	}

    public function statusTransaksi()
    {
        $nomor_transaksi    = $this->request->getVar('nomor_transaksi');
        $jenis              = $this->request->getVar('jenis');

        $data = array(
            "is_".$jenis    => 1,
            "waktu_".$jenis => date("Y-m-d H:i:s")
        );

        $this->transaksi_model->set($data)->where('nomor_transaksi', $nomor_transaksi)->update();

        $ret['status']  = "OK";
        $ret['message'] = "Ubah status ".$jenis." berhasil!";

        echo json_encode($ret);
    }

    public function printTransaksi()
    {
        $nomor_transaksi        = $this->request->getVar('nomor_transaksi');
        $data                   = $this->transaksi_model->getData($nomor_transaksi)->getRowArray();
        $data['waktu_cetak']    = date('d-m-Y H:i:s');
        $data['petugas_cetak']  = session()->get('nama');

		return view('admin/pages/transaksi_print', $data);
    }

    public function getCabangTujuan()
    {
        $id_cabang_asal     = $this->request->getVar('id');
        $data               = $this->rute_model->getCabangTujuanRute($id_cabang_asal)->getResultArray();
        
        echo json_encode($data);
    }

    public function getListJadwal()
    {
        $tgl_berangkat              = $this->request->getVar('tgl_berangkat');
        $id_rute                    = $this->request->getVar('id');

        $kapasitas_default          = $this->mobil_model->getKapasitasDefault();        
        $arr_jadwal                 = $this->jadwal_model->getListJadwalByRute($tgl_berangkat, $id_rute)->getResultArray();
        
        $data_jadwal = array();

        foreach($arr_jadwal as $jadwal)
        {
            $kapasitas      = !empty($jadwal['kapasitas'])?$jadwal['kapasitas']:$kapasitas_default;
            $kursi_tersedia = $kapasitas-$jadwal['kursi_terisi'];

            $data_jadwal[] = array(
                'id_jadwal'         => $jadwal['id_jadwal'],
                'jam_berangkat'     => $jadwal['jam_berangkat']. ' (Tersedia '.$kursi_tersedia.' Kursi)',
            );
        }

        $data['jadwal'] = $data_jadwal;
        
        echo json_encode($data);
    }

    public function getListTransaksi()
    {
        $tgl_berangkat              = $this->request->getVar('tgl_berangkat');
        $id_jadwal                  = $this->request->getVar('id_jadwal');

        $arr_jadwal                 = $this->jadwal_model->getData($id)->getRowArray();
        $rute                       = $arr_jadwal['nama_rute'];
        $waktu_berangkat            = date("d-m-Y H:i", strtotime($tgl_berangkat.' '.$arr_jadwal['jam_berangkat']));
        $harga_tiket                = $arr_jadwal['harga_tiket'];

        $data['transaksi']          = $this->transaksi_model->getListData($tgl_berangkat, $tgl_berangkat, 4, $id_jadwal)->getResultArray();
        $kursi_terisi               = count($data['transaksi']);
        
        $arr_penjadwalan            = $this->penjadwalan_model->getData($tgl_berangkat, $id_jadwal)->getRowArray();
        $kapasitas_default          = $this->mobil_model->getKapasitasDefault();
        $kapasitas                  = isset($arr_penjadwalan['kapasitas'])?$arr_penjadwalan['kapasitas']:$kapasitas_default;
        $data['penjadwalan']        = array(
            'rute'              => $rute,
            'waktu_berangkat'   => $waktu_berangkat,
            'harga_tiket'       => 'Rp ' . number_format($harga_tiket, 0, ',', '.'),
            'kapasitas'         => $kapasitas,
            'kursi_terisi'      => $kursi_terisi,
            'kursi_tersedia'    => $kapasitas-$kursi_terisi,
            'id_mobil'          => isset($arr_penjadwalan['id_mobil'])?$arr_penjadwalan['id_mobil']:'',
            'mobil'             => isset($arr_penjadwalan['mobil'])?$arr_penjadwalan['mobil']:'-MOBIL BELUM DIATUR-',
            'id_sopir'          => isset($arr_penjadwalan['id_sopir'])?$arr_penjadwalan['id_sopir']:'',
            'sopir'             => isset($arr_penjadwalan['nama_sopir'])?$arr_penjadwalan['nama_sopir']:'-SOPIR BELUM DIATUR-',
        );
        
        echo json_encode($data);
    }

    public function savePenjadwalan()
	{
        $tgl_berangkat  = $this->request->getVar('tgl_berangkat');
        $id_jadwal      = $this->request->getVar('id_jadwal');
        $id_mobil       = $this->request->getVar('id_mobil');
        $id_sopir       = $this->request->getVar('id_sopir');

        $arr_penjadwalan = $this->penjadwalan_model->getData($tgl_berangkat, $id_jadwal)->getRowArray();

        if(isset($arr_penjadwalan))
        {
            $data['id_penjadwalan'] = $arr_penjadwalan['id_penjadwalan'];
        }

        $data['tgl_berangkat']  = $tgl_berangkat;
        $data['id_jadwal']      = $id_jadwal;
        $data['id_mobil']       = $id_mobil;
        $data['id_sopir']       = $id_sopir;

        $this->penjadwalan_model->save($data);

        $ret['status']  = "OK";
        $ret['message'] = "Penjadwalan berhasil disimpan!";

        echo json_encode($ret);
	}

    public function users()
	{
        $data['page']       = 'users';
        $data['cabang']     = $this->cabang_model->findAll();
        $data['users']      = $this->users_model->getData()->getResultArray();
        $data['level']      = array('Admin', 'Pengadaan', 'Penjadwalan', 'Kasir');

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
        $level          = $this->request->getVar('level');
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
            $data['level']      = $level;
            
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