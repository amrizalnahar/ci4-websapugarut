<?php

namespace App\Controllers;

use App\Models\kelahiranModel;

class AdminKelahiran extends BaseController
{
	// menupublik_kelahiran = nama tabel di database sapugarut
	protected $kelahiranModel;
	public function __construct()
	{
		// kelahiranModel nama variabel di menupublik_kelahiran
		$this->kelahiranModel  = new kelahiranModel();
	}

	public function index()
	{
		helper('text');
		// $kelahiran = $this->kelahiranModel->findAll();
		$currentPage = $this->request->getVar('page_tb_kelahiran') ?  $this->request->getVar('page_tb_kelahiran')  : 1;

		// Searching
		$keyword_kelahiran = $this->request->getVar('keyword_kelahiran');
		if ($keyword_kelahiran) {
			$kelahiran = $this->kelahiranModel->search($keyword_kelahiran);
		} else {
			$kelahiran = $this->kelahiranModel;
		}
		$model = new kelahiranModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah kelahiran | Admin Kelurahan Sapugarut',
			// 'kelahiran' => $this->kelahiranModel->getkelahiran()
			'list' => $list,
			'kelahiran' => $this->kelahiranModel->paginate(5, 'tb_kelahiran'),
			'pager' => $this->kelahiranModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminkelahiran'
		];

		return view('pages/admin/v_adminkelahiran', $data);
	}

	public function tambahkelahiran()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah kelahiran | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahkelahiran', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_kelahiran' =>  [
				'rules' => 'required|is_unique[tb_kelahiran.judul_kelahiran]',
				'errors' => [
					'required' => 'Judul kelahiran harus diisi.',
					'is_unique' => 'Judul kelahiran sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminkelahiran/tambahkelahiran');
			// return redirect()->to('/adminkelahiran/tambahkelahiran')->withInput()->with('validation', $validation);
			return redirect()->to('/adminkelahiran/tambahkelahiran')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_kelahiran'), '-', true);
		$this->kelahiranModel->save([
			'judul_kelahiran' => $this->request->getVar('judul_kelahiran'),
			'slug_kelahiran' => $slug,
			'isi_kelahiran' => $this->request->getVar('isi_kelahiran'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminkelahiran');
	}

	public function delete($id_kelahiran)
	{
		// cari gambar berdasarkan id
		$kelahiran = $this->kelahiranModel->find($id_kelahiran);

		$this->kelahiranModel->delete($id_kelahiran);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminkelahiran');
	}

	public function edit($slug_kelahiran)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit kelahiran | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'kelahiran' => $this->kelahiranModel->getkelahiran($slug_kelahiran),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminkelahiran'
		];

		return view('pages/admin/v_editkelahiran', $data);
	}

	public function update($id_kelahiran)
	{
		// cek judul
		$kelahiranLama = $this->kelahiranModel->getkelahiran($this->request->getVar('slug_kelahiran'));
		if ($kelahiranLama['judul_kelahiran'] == $this->request->getVar('judul_kelahiran')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_kelahiran.judul_kelahiran]';
		}
		// validasi input
		if (!$this->validate([
			'judul_kelahiran' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul kelahiran harus diisi.',
					'is_unique' => 'Judul kelahiran sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/adminkelahiran/edit/' . $this->request->getVar('slug_kelahiran'))->withInput();
		}

		$slug_kelahiran = url_title($this->request->getVar('judul_kelahiran'), '-', true);
		$this->kelahiranModel->save([
			'id_kelahiran' => $id_kelahiran,
			'judul_kelahiran' => $this->request->getVar('judul_kelahiran'),
			'slug_kelahiran' => $slug_kelahiran,
			'isi_kelahiran' => $this->request->getVar('isi_kelahiran'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminkelahiran');
	}
}
