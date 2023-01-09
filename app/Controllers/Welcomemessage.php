<?php

namespace App\Controllers;


class  welcomemessage extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Selamat Datang di Kelurahan Sapugarut | Pemerintah Kabupaten Pekalongan',
		];
		return view('pages/v_welcomemessage', $data);
	}
}
