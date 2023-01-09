<?php

namespace App\Controllers;

use App\Models\hargatanahModel;

class  Surathargatanah extends BaseController
{

	public function index()
	{
		$this->hargatanahModel = new hargatanahModel();
		$hargatanah = $this->hargatanahModel->findAll();
		$data = [
			'title' => 'Pembutan hargatanah | Admin Kelurahan Sapugarut',
			'hargatanah' => $hargatanah
		];

		return view('pages/v_surathargatanah', $data);
	}
}
