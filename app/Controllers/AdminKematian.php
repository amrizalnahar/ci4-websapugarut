<?php

namespace App\Controllers;

use App\Models\kematianModel;

class AdminKematian extends BaseController
{
	// menupublik_kematian = nama tabel di database sapugarut
	protected $kematianModel;
	public function __construct()
	{
		// kematianModel nama variabel di menupublik_kematian
		$this->kematianModel  = new kematianModel();
	}

	public function index()
	{
		helper('text');
		// $kematian = $this->kematianModel->findAll();
		$currentPage = $this->request->getVar('page_tb_kematian') ?  $this->request->getVar('page_tb_kematian')  : 1;

		// Searching
		$keyword_kematian = $this->request->getVar('keyword_kematian');
		if ($keyword_kematian) {
			$kematian = $this->kematianModel->search($keyword_kematian);
		} else {
			$kematian = $this->kematianModel;
		}
		$model = new kematianModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah kematian | Admin Kelurahan Sapugarut',
			// 'kematian' => $this->kematianModel->getkematian()
			'list' => $list,
			'kematian' => $this->kematianModel->paginate(5, 'tb_kematian'),
			'pager' => $this->kematianModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminkematian'
		];

		return view('pages/admin/v_adminkematian', $data);
	}

	public function tambahkematian()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah kematian | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahkematian', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_kematian' =>  [
				'rules' => 'required|is_unique[tb_kematian.judul_kematian]',
				'errors' => [
					'required' => 'Judul kematian harus diisi.',
					'is_unique' => 'Judul kematian sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminkematian/tambahkematian');
			// return redirect()->to('/adminkematian/tambahkematian')->withInput()->with('validation', $validation);
			return redirect()->to('/adminkematian/tambahkematian')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_kematian'), '-', true);
		$this->kematianModel->save([
			'judul_kematian' => $this->request->getVar('judul_kematian'),
			'slug_kematian' => $slug,
			'isi_kematian' => $this->request->getVar('isi_kematian'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminkematian');
	}

	public function delete($id_kematian)
	{
		// cari gambar berdasarkan id
		$kematian = $this->kematianModel->find($id_kematian);

		$this->kematianModel->delete($id_kematian);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminkematian');
	}

	public function edit($slug_kematian)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit kematian | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'kematian' => $this->kematianModel->getkematian($slug_kematian),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminkematian'
		];

		return view('pages/admin/v_editkematian', $data);
	}

	public function update($id_kematian)
	{
		// cek judul
		$kematianLama = $this->kematianModel->getkematian($this->request->getVar('slug_kematian'));
		if ($kematianLama['judul_kematian'] == $this->request->getVar('judul_kematian')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_kematian.judul_kematian]';
		}
		// validasi input
		if (!$this->validate([
			'judul_kematian' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul kematian harus diisi.',
					'is_unique' => 'Judul kematian sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/adminkematian/edit/' . $this->request->getVar('slug_kematian'))->withInput();
		}

		$slug_kematian = url_title($this->request->getVar('judul_kematian'), '-', true);
		$this->kematianModel->save([
			'id_kematian' => $id_kematian,
			'judul_kematian' => $this->request->getVar('judul_kematian'),
			'slug_kematian' => $slug_kematian,
			'isi_kematian' => $this->request->getVar('isi_kematian'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminkematian');
	}
}
