<?php

namespace App\Controllers;

use App\Models\kelahiranModel;

class  Suratkelahiran extends BaseController
{

	public function index()
	{
		$this->kelahiranModel = new kelahiranModel();
		$kelahiran = $this->kelahiranModel->findAll();
		$data = [
			'title' => 'Pembutan kelahiran | Admin Kelurahan Sapugarut',
			'kelahiran' => $kelahiran
		];

		return view('pages/v_suratkelahiran', $data);
	}
}
