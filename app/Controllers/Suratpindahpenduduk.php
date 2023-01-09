<?php

namespace App\Controllers;

use App\Models\pindahpendudukModel;

class  Suratpindahpenduduk extends BaseController
{

	public function index()
	{
		$this->pindahpendudukModel = new pindahpendudukModel();
		$pindahpenduduk = $this->pindahpendudukModel->findAll();
		$data = [
			'title' => 'Pembuatan Surat Pindah Penduduk | Admin Kelurahan Sapugarut',
			'pindahpenduduk' => $pindahpenduduk
		];

		return view('pages/v_suratpindahpenduduk', $data);
	}
}
