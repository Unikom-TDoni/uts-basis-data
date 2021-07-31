<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Kota_model;

class Kota extends ResourceController
{
	use ResponseTrait;

	public function __construct()
    {
        $this->kota_model = new Kota_model();
    }

	public function index()
    {
        $data = $this->kota_model->findAll();
        
		return $this->respond($data, 200);
    }
    
    public function getListKotaByProvinsi()
    {
        $data = $this->kota_model->where('id_provinsi', $this->request->getVar('id_provinsi'))->findAll();
        
		return $this->respond($data, 200);
    }
}
