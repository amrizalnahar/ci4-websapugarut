<?php

namespace App\Controllers;

use App\Models\komoditiModel;

class  Komoditiunggulan extends BaseController
{
	protected $komoditiModel;
	public function __construct()
	{
		$this->komoditiModel  = new komoditiModel();
	}

	public function index()
	{

		helper('text');
		$currentPage = $this->request->getVar('page_tb_komoditiunggulan') ?  $this->request->getVar('page_tb_komoditiunggulan')  : 1;
		// Searching
		$keyword_komoditi = $this->request->getVar('keyword_komoditi');
		if ($keyword_komoditi) {
			$komoditi = $this->komoditiModel->search($keyword_komoditi);
		} else {
			$komoditi = $this->komoditiModel;
		}
		$data = [
			'title' => 'komoditi | Kelurahan Sapugarut',
			'listing_komoditi' => $this->komoditiModel->listing(),
			'komoditi' => $this->komoditiModel->paginate(5, 'tb_komoditiunggulan'),
			'pager' => $this->komoditiModel->pager,
			'currentPage' => $currentPage
		];

		return view('pages/v_komoditiunggulan', $data);
	}


	public function detail($slug_komoditi)
	{
		helper('text');
		$model = new komoditiModel();
		$list_komoditi = $model->listing();

		$data = [
			'title' => 'komoditi | Admin Kelurahan Sapugarut',
			'komoditi' => $this->komoditiModel->getkomoditi($slug_komoditi),
			'list_komoditi' => $list_komoditi
		];

		return view('pages/v_komoditiunggulandetail', $data);
	}
}
