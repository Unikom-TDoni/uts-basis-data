<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Cabang_model;
use App\Models\Rute_model;

class Cabang extends ResourceController
{
	use ResponseTrait;

	public function __construct()
    {
        $this->cabang_model = new Cabang_model();
        $this->rute_model   = new Rute_model();
    }

	public function index()
    {
        $data = $this->cabang_model->getData()->getResultArray();
        
		return $this->respond($data, 200);
    }
 
    // get single product
    public function show($id = null)
    {
        $data = $this->cabang_model->getData($id)->getRowArray();

        if($data)
		{
            return $this->respond($data);
        }
		else
		{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create a product
    public function create()
    {
        $data['nama_cabang']    = $this->request->getVar('nama');
        $data['id_kota']        = $this->request->getVar('kota');
        $data['telp']           = $this->request->getVar('telp');
        $data['alamat']         = $this->request->getVar('alamat');

        $this->cabang_model->insert($data);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
         
        return $this->respondCreated($response);
    }
 
    // update product
    public function update($id = null)
    {	
        $data['nama_cabang']    = $this->request->getVar('nama');
        $data['id_kota']        = $this->request->getVar('kota');
        $data['telp']           = $this->request->getVar('telp');
        $data['alamat']         = $this->request->getVar('alamat');

        $this->cabang_model->update($id, $data);

		$response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
 
    // delete product
    public function delete($id = null)
    {
        $data = $this->cabang_model->find($id);
        
		if($data)
		{
            $this->cabang_model->delete($id);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }
		else
		{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    public function cabangTujuan()
    {
        $id_cabang_asal = $this->request->getVar('id');
        $data = $this->rute_model->getCabangTujuanRute($id_cabang_asal)->getResultArray();

        if($data)
		{
            return $this->respond($data);
        }
		else
		{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}
