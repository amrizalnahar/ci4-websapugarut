<?php

namespace App\Controllers;

use App\Models\visimisiModel;

class  Visimisi extends BaseController
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
			'title' => 'Visi dan Misi | Kelurahan Sapugarut',
			'visi' => 'Mewujudkan SmartCity',
			'misi1' => '1. Kota Bersih dan Indah',
			'misi2' => '1. Kota Nyaman dan Aman',
			'misi3' => '1. Kota Sejuk dan Sehat'

		];

		return view('pages/v_visimisi', $data);
	}
}
