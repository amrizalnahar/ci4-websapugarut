<?php

namespace App\Controllers;

class  User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'User | Admin Kelurahan Sapugarut',
			'currentAdminMenu' => 'pengguna',
			'currentAdminSubMenu' => 'pengguna',
		];
		return view('pages/user/v_user', $data);
	}
}
