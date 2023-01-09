<?php

namespace App\Controllers;

use App\Models\domisiliusahaModel;


class AdminDomisiliusaha extends BaseController
{
	// menupublik_domisiliusaha = nama tabel di database sapugarut
	protected $domisiliusahaModel;
	public function __construct()
	{
		// domisiliusahaModel nama variabel di menupublik_domisiliusaha
		$this->domisiliusahaModel  = new domisiliusahaModel();
	}

	public function index()
	{
		helper('text');
		// $domisiliusaha = $this->domisiliusahaModel->findAll();
		$currentPage = $this->request->getVar('page_tb_domisiliusaha') ?  $this->request->getVar('page_tb_domisiliusaha')  : 1;

		// Searching
		$keyword_domisiliusaha = $this->request->getVar('keyword_domisiliusaha');
		if ($keyword_domisiliusaha) {
			$domisiliusaha = $this->domisiliusahaModel->search($keyword_domisiliusaha);
		} else {
			$domisiliusaha = $this->domisiliusahaModel;
		}
		$model = new domisiliusahaModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah domisiliusaha | Admin Kelurahan Sapugarut',
			// 'domisiliusaha' => $this->domisiliusahaModel->getdomisiliusaha()
			'list' => $list,
			'domisiliusaha' => $this->domisiliusahaModel->paginate(5, 'tb_domisiliusaha'),
			'pager' => $this->domisiliusahaModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'admindomisiliusaha'
		];

		return view('pages/admin/v_admindomisiliusaha', $data);
	}

	public function tambahdomisiliusaha()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah domisiliusaha | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahdomisiliusaha', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_domisiliusaha' =>  [
				'rules' => 'required|is_unique[tb_domisiliusaha.judul_domisiliusaha]',
				'errors' => [
					'required' => 'Judul domisiliusaha harus diisi.',
					'is_unique' => 'Judul domisiliusaha sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/admindomisiliusaha/tambahdomisiliusaha');
			// return redirect()->to('/admindomisiliusaha/tambahdomisiliusaha')->withInput()->with('validation', $validation);
			return redirect()->to('/admindomisiliusaha/tambahdomisiliusaha')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_domisiliusaha'), '-', true);
		$this->domisiliusahaModel->save([
			'judul_domisiliusaha' => $this->request->getVar('judul_domisiliusaha'),
			'slug_domisiliusaha' => $slug,
			'isi_domisiliusaha' => $this->request->getVar('isi_domisiliusaha'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/admindomisiliusaha');
	}

	public function delete($id_domisiliusaha)
	{
		// cari gambar berdasarkan id
		$domisiliusaha = $this->domisiliusahaModel->find($id_domisiliusaha);

		$this->domisiliusahaModel->delete($id_domisiliusaha);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/admindomisiliusaha');
	}

	public function edit($slug_domisiliusaha)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit domisiliusaha | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'domisiliusaha' => $this->domisiliusahaModel->getdomisiliusaha($slug_domisiliusaha),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'admindomisiliusaha'
		];

		return view('pages/admin/v_editdomisiliusaha', $data);
	}

	public function update($id_domisiliusaha)
	{
		// cek judul
		$domisiliusahaLama = $this->domisiliusahaModel->getdomisiliusaha($this->request->getVar('slug_domisiliusaha'));
		if ($domisiliusahaLama['judul_domisiliusaha'] == $this->request->getVar('judul_domisiliusaha')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_domisiliusaha.judul_domisiliusaha]';
		}
		// validasi input
		if (!$this->validate([
			'judul_domisiliusaha' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul domisiliusaha harus diisi.',
					'is_unique' => 'Judul domisiliusaha sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/admindomisiliusaha/edit/' . $this->request->getVar('slug_domisiliusaha'))->withInput();
		}

		$slug_domisiliusaha = url_title($this->request->getVar('judul_domisiliusaha'), '-', true);
		$this->domisiliusahaModel->save([
			'id_domisiliusaha' => $id_domisiliusaha,
			'judul_domisiliusaha' => $this->request->getVar('judul_domisiliusaha'),
			'slug_domisiliusaha' => $slug_domisiliusaha,
			'isi_domisiliusaha' => $this->request->getVar('isi_domisiliusaha'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/admindomisiliusaha');
	}
}
