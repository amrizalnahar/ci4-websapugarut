<?php

namespace App\Controllers;

// use App\Models\visimisiModel;

class  Sdm extends BaseController
{
	// menupublik_berita = nama tabel di database sapugarut
	// protected $visimisi;
	// public function __construct()
	// {
	// 	// beritaModel nama variabel di menupublik_berita
	// 	$this->visimisiModel  = new visimisiModel();
	// }

	public function index()
	{
		// beritaModel = Variabel -- menupublik_berita = nama tabel
		// $beritaModel = new menupublik_beritaModel();
		// $visimisi = $this->visimisiModel->findAll();

		$data = [
			'title' => 'Sumber Daya Manusia | Kelurahan Sapugarut',

		];

		return view('pages/v_sdm', $data);
	}
}
