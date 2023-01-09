<?php

namespace App\Controllers;

use App\Models\kematianModel;

class  Suratkematian extends BaseController
{

	public function index()
	{
		$this->kematianModel = new kematianModel();
		$kematian = $this->kematianModel->findAll();
		$data = [
			'title' => 'Pembutan kematian | Admin Kelurahan Sapugarut',
			'kematian' => $kematian
		];

		return view('pages/v_suratkematian', $data);
	}
}
