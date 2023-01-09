<?php

namespace App\Controllers;

use App\Models\domisiliusahaModel;

class  Suratdomisiliusaha extends BaseController
{

	public function index()
	{
		$this->domisiliusahaModel = new domisiliusahaModel();
		$domisiliusaha = $this->domisiliusahaModel->findAll();
		$data = [
			'title' => 'Pembutan domisiliusaha | Admin Kelurahan Sapugarut',
			'domisiliusaha' => $domisiliusaha
		];

		return view('pages/v_suratdomisiliusaha', $data);
	}
}
