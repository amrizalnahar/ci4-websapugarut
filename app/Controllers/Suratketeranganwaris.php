<?php

namespace App\Controllers;

use App\Models\warisModel;

class  Suratketeranganwaris extends BaseController
{

	public function index()
	{
		$this->warisModel = new warisModel();
		$waris = $this->warisModel->findAll();
		$data = [
			'title' => 'Pembutan waris | Admin Kelurahan Sapugarut',
			'waris' => $waris
		];

		return view('pages/v_suratwaris', $data);
	}
}
