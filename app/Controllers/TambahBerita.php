<?php

namespace App\Controllers;

use App\Models\beritaModel;

class TambahBerita extends BaseController
{
    // menupublik_berita = nama tabel di database sapugarut
	protected $beritaModel;
	public function __construct()
	{
		// beritaModel nama variabel di menupublik_berita
		$this->beritaModel  = new beritaModel();
	}

	public function index()
	{
		helper('text');
        $berita = $this->beritaModel->findAll();        
        $data = [
            'title' => 'Tambah Berita | Admin Kelurahan Sapugarut',
			'berita' => $berita
		];
        

		return view('pages/admin/v_tambahberita', $data);
	}
}
