<?php

namespace App\Repository;

use App\Models\Jadwal_model;

class JadwalRepository
{
    public function __construct()
    {
        $this->jadwal = new Jadwal_model();
    }

    public function getJamBerangkat($asal, $tujuan)
    {
        return $this->jadwal
            ->select('jam_berangkat')
            ->join('rute', 'jadwal.id_rute = rute.id_rute')
            ->getWhere(['id_cabang_asal' => $asal, 'id_cabang_tujuan' => $tujuan])
            ->getResult();
    }    
}