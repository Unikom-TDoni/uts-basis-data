<?php

namespace App\Service;

use App\Repository\CabangRepository;
use App\Repository\JadwalRepository;
use App\Repository\RuteRepository;

class HomeService
{
    public function __construct()
    {
        $this->ruteRepo = new RuteRepository();
        $this->cabangRepo = new CabangRepository();
        $this->jadwalRepo = new JadwalRepository();
    }

    public function getInitialData()
    {
        $data['cabang'] = $this->cabangRepo->getAllCabang();
        return $data;
    }

    public function getJadwal($asal, $tujuan)
    {   
        $data['cabangAsal']     = $this->cabangRepo->getCabang($asal);
        $data['cabangTujuan']   = $this->cabangRepo->getCabang($tujuan);
        $data['rute']           = $this->ruteRepo->getDataRute($asal, $tujuan);
        $data['jadwal']         = $this->jadwalRepo->getJamBerangkat($asal, $tujuan);

        return $data;
    }
}