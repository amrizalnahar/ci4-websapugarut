<?php

namespace App\Controllers;

use App\Models\beritaModel;

class  Berita extends BaseController
{
	// menupublik_berita = nama tabel di database sapugarut

	protected $beritaModel;
	protected $db, $builder;
	public function __construct()
	{
		// beritaModel nama variabel di menupublik_berita
		$this->beritaModel  = new beritaModel();
		$this->db = \Config\Database::connect();
		$this->builder = $this->db->table('users');
	}

	public function index()
	{
		helper('text');
		$currentPage = $this->request->getVar('page_tb_berita') ?  $this->request->getVar('page_tb_berita')  : 1;
		// Searching
		$keyword_berita = $this->request->getVar('keyword_berita');
		if ($keyword_berita) {
			$berita = $this->beritaModel->search($keyword_berita);
		} else {
			$berita = $this->beritaModel;
		}

		$data = [
			'title' => 'Berita | Kelurahan Sapugarut',
			'listing_berita' => $this->beritaModel->listing(),
			'berita' => $this->beritaModel->paginate(5, 'tb_berita'),
			'pager' => $this->beritaModel->pager,
			'currentPage' => $currentPage

		];

		return view('pages/v_berita', $data);
	}

	public function detail($slug_berita)
	{
		$data = [
			'title' => 'Berita | Admin Kelurahan Sapugarut',
			'berita' => $this->beritaModel->getBerita($slug_berita),
			'list_berita' => $this->beritaModel->listing()
		];

		return view('pages/v_beritadetail', $data);
	}
}
