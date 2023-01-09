<?php

namespace App\Controllers;

use App\Models\ktpModel;

class  Pembuatanktp extends BaseController
{

	public function index()
	{
		$this->ktpModel = new ktpModel();
		$ktp = $this->ktpModel->findAll();
		$data = [
			'title' => 'Pembutan KTP | Admin Kelurahan Sapugarut',
			'ktp' => $ktp
		];

		return view('pages/v_pembuatanktp', $data);
	}
}
