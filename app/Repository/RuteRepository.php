<?php

namespace App\Repository;

use App\Models\Rute_model;

class RuteRepository
{
    public function __construct()
    {
        $this->rute = new Rute_model();
    }

    public function getWaktuTempuh($asal, $tujuan)
    {
        return $this->rute
            ->select('waktu_tempuh')
            ->getWhere(['id_cabang_asal' => $asal, 'id_cabang_tujuan' => $tujuan])
            ->getRow();
    }    
}