<?php

namespace App\Controllers;

use App\Models\loginModel;

class  AdminPengaduanmasyarakat extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Pengaduan Masyarakat | Admin Kelurahan Sapugarut',
			'currentAdminMenu' => 'pengaduanmasyarakat',
			'currentAdminSubMenu' => 'pengaduanmasyarakat'
		];

		return view('pages/admin/v_pengaduanmasyarakat', $data);
	}
}
