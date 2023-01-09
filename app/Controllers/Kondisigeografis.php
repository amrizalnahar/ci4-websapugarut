<?php

namespace App\Controllers;

use App\Models\kondisigeografisModel;

class  Kondisigeografis extends BaseController
{
	// menupublik_berita = nama tabel di database sapugarut

	public function index()
	{
		// beritaModel = Variabel -- menupublik_berita = nama tabel
		// $beritaModel = new menupublik_beritaModel();

		$data = [
			'title' => 'Kondisi Geografis | Kelurahan Sapugarut',
		];

		return view('pages/v_kondisigeografis', $data);
	}
}
