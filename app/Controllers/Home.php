<?php

namespace App\Controllers;

use App\Service\HomeService;

class Home extends BaseController
{
	public function __construct()
    {
        $this->homeService = new HomeService();
    }

	public function index()
	{
		$data = $this->homeService->getInitialData();
        return view('welcome_message', $data);
	}

	public function getJadwal()
	{
		$reqData 	= $this->request->getPost();
		$jadwal 	= $this->homeService->getJadwal($reqData['id_cabang_asal'], $reqData['id_cabang_tujuan']);
        
		echo json_encode($jadwal);
	}
}