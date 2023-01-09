<?php

namespace App\Controllers;

use App\Models\produkModel;

class  produkunggulan extends BaseController
{
	protected $produkModel;
	public function __construct()
	{
		$this->produkModel  = new produkModel();
	}


	public function index()
	{

		helper('text');
		$currentPage = $this->request->getVar('page_tb_produkunggulan') ?  $this->request->getVar('page_tb_produkunggulan')  : 1;
		// Searching
		$keyword_produk = $this->request->getVar('keyword_produk');
		if ($keyword_produk) {
			$produk = $this->produkModel->search($keyword_produk);
		} else {
			$produk = $this->produkModel;
		}
		$data = [
			'title' => 'produk | Kelurahan Sapugarut',
			'listing_produk' => $this->produkModel->listing(),
			'produk' => $this->produkModel->paginate(5, 'tb_produkunggulan'),
			'pager' => $this->produkModel->pager,
			'currentPage' => $currentPage
		];

		return view('pages/v_produkunggulan', $data);
	}


	public function detail($slug_produk)
	{
		helper('text');
		$model = new produkModel();
		$list_produk = $model->listing();

		$data = [
			'title' => 'produk | Admin Kelurahan Sapugarut',
			'produk' => $this->produkModel->getproduk($slug_produk),
			'list_produk' => $list_produk
		];

		return view('pages/v_produkunggulandetail', $data);
	}
}
