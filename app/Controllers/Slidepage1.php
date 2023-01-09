<?php

namespace App\Controllers;


class  Slidepage1 extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Headline 1 | Pemerintah Kabupaten Pekalongan',
		];
		return view('pages/v_slideberita1', $data);
	}
}
