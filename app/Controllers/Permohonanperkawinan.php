<?php

namespace App\Controllers;

use App\Models\perkawinanModel;

class  Permohonanperkawinan extends BaseController
{

	public function index()
	{
		$this->perkawinanModel = new perkawinanModel();
		$perkawinan = $this->perkawinanModel->findAll();
		$data = [
			'title' => 'Pembuatan Permohonan Perkawinan | Admin Kelurahan Sapugarut',
			'permohonanperkawinan' => $perkawinan
		];

		return view('pages/v_permohonanperkawinan', $data);
	}
}
