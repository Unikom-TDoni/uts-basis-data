<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Provinsi_model;

class Provinsi extends ResourceController
{
	use ResponseTrait;

	public function __construct()
    {
        $this->provinsi_model = new Provinsi_model();
    }

	public function index()
    {
        $data = $this->provinsi_model->findAll();
        
		return $this->respond($data, 200);
    }
}
