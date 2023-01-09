<?php

namespace App\Controllers;


class  Slidepage2 extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Headline 2 | Pemerintah Kabupaten Pekalongan',
		];
		return view('pages/v_slideberita2', $data);
	}
}
