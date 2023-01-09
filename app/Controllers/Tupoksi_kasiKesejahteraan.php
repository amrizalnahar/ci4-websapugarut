<?php

namespace App\Controllers;

// use App\Models\visimisiModel;

class  Tupoksi_kasiKesejahteraan extends BaseController
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
			'title' => 'Tugas Pokok dan Fungsi Lurah | Kelurahan Sapugarut',

		];

		return view('pages/v_tupoksi_kasiKesejahteraan', $data);
	}
}
