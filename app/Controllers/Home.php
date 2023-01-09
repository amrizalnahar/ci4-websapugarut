<?php

namespace App\Controllers;

use App\Models\beritaModel;
use App\Models\informasiModel;

class  Home extends BaseController
{
	// menupublik_berita = nama tabel di database sapugarut
	protected $beritaModel;
	public function __construct()
	{
		// beritaModel nama variabel di menupublik_berita
		$this->beritaModel  = new beritaModel();
		$this->informasiModel  = new informasiModel();
	}

	public function index()
	{
		helper('text');
		$berita = $this->beritaModel->findAll();
		$informasi = $this->informasiModel->findAll();

		$data = [
			'title' => 'Kelurahan Sapugarut | Pemerintah Kabupaten Pekalongan',
			'berita' => $berita,
			'informasi' => $informasi
		];
		return view('pages/v_home', $data);
	}


	public function potensidesa()
	{
		$data = [
			'title' => 'Potensi Desa | Kelurahan Sapugarut'
		];

		return view('pages/potensidesa', $data);
	}

	public function berita()
	{
		// beritaModel = Variabel -- menupublik_berita = nama tabel
		// $beritaModel = new menupublik_beritaModel();
		$berita = $this->beritaModel->findAll();

		$data = [
			'title' => 'Berita | Kelurahan Sapugarut',
			'berita' => $berita
		];

		return view('pages/v_berita', $data);
	}

	public function informasi()
	{
		// beritaModel = Variabel -- menupublik_berita = nama tabel
		// $beritaModel = new menupublik_beritaModel();
		$informasi = $this->informasiModel->findAll();

		$data = [
			'title' => 'Informasi | Kelurahan Sapugarut',
			'informasi' => $informasi
		];

		return view('pages/v_informasi', $data);
	}
}
