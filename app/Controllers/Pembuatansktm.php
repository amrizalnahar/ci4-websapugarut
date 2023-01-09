<?php

namespace App\Controllers;

use App\Models\sktmModel;

class  Pembuatansktm extends BaseController
{

	public function index()
	{
		$this->sktmModel = new sktmModel();
		$sktm = $this->sktmModel->findAll();
		$data = [
			'title' => 'Pembuatan SKTM | Admin Kelurahan Sapugarut',
			'sktm' => $sktm
		];

		return view('pages/v_pembuatansktm', $data);
	}
}
