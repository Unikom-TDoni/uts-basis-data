<?php

namespace App\Repository;

use App\Models\Cabang_model;

class CabangRepository
{
    public function __construct()
    {
        $this->cabang = new Cabang_model();
    }

    public function getCabang($id)
    {
        return $this->cabang
            ->select('cabang.nama_cabang, kota.nama as nama_kota')
            ->join('kota', 'kota.id = cabang.id_kota')
            ->getWhere(['id_cabang' => $id])
            ->getRow();
    }

    public function getAllCabang()
    {
        return $this->cabang
                ->select('cabang.*, kota.nama AS nama_kota, provinsi.nama AS nama_provinsi')
                ->join('kota', 'kota.id = cabang.id_kota')
                ->join('provinsi', 'provinsi.id = kota.id_provinsi')
                ->get()
                ->getResult();
    }    
}