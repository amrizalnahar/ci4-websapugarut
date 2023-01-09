<?php

namespace App\Controllers;

use App\Models\loginModel;

class  Login extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Login | Kelurahan Sapugarut',
		];
		return view('pages/admin/v_admin', $data);
	}
}
