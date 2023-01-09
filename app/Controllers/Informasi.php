<?php

namespace App\Controllers;

use App\Models\informasiModel;

class  Informasi extends BaseController
{
	// menupublik_informasi = nama tabel di database sapugarut
	protected $informasiModel;
	public function __construct()
	{
		// informasiModel nama variabel di menupublik_informasi
		$this->informasiModel  = new informasiModel();
	}

	public function index()
	{
		helper('text');
		$currentPage = $this->request->getVar('page_tb_informasi') ?  $this->request->getVar('page_tb_informasi')  : 1;
		// Searching
		$keyword_informasi = $this->request->getVar('keyword_informasi');
		if ($keyword_informasi) {
			$informasi = $this->informasiModel->search($keyword_informasi);
		} else {
			$informasi = $this->informasiModel;
		}
		$data = [
			'title' => 'Informasi | Kelurahan Sapugarut',
			'listing_informasi' => $this->informasiModel->listing(),
			'informasi' => $this->informasiModel->paginate(5, 'tb_informasi'),
			'pager' => $this->informasiModel->pager,
			'currentPage' => $currentPage
		];

		return view('pages/v_informasi', $data);
	}


	public function detail($slug_informasi)
	{
		helper('text');
		$model = new informasiModel();
		$list_informasi = $model->listing();

		$data = [
			'title' => 'informasi | Admin Kelurahan Sapugarut',
			'informasi' => $this->informasiModel->getinformasi($slug_informasi),
			'list_informasi' => $list_informasi,
		];

		return view('pages/v_informasidetail', $data);
	}
}
