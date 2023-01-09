<?php

namespace App\Controllers;

use App\Models\jaminanpersalinanModel;

class  Suratjaminanpersalinan extends BaseController
{

	public function index()
	{
		$this->jaminanpersalinanModel = new jaminanpersalinanModel();
		$jaminanpersalinan = $this->jaminanpersalinanModel->findAll();
		$data = [
			'title' => 'Pembutan jaminanpersalinan | Admin Kelurahan Sapugarut',
			'jaminanpersalinan' => $jaminanpersalinan
		];

		return view('pages/v_jaminanpersalinan', $data);
	}
}
