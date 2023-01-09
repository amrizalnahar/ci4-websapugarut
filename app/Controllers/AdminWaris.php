<?php

namespace App\Controllers;

use App\Models\warisModel;

class AdminWaris extends BaseController
{
	// menupublik_waris = nama tabel di database sapugarut
	protected $warisModel;
	public function __construct()
	{
		// warisModel nama variabel di menupublik_waris
		$this->warisModel  = new warisModel();
	}

	public function index()
	{
		helper('text');
		// $waris = $this->warisModel->findAll();
		$currentPage = $this->request->getVar('page_tb_waris') ?  $this->request->getVar('page_tb_waris')  : 1;

		// Searching
		$keyword_waris = $this->request->getVar('keyword_waris');
		if ($keyword_waris) {
			$waris = $this->warisModel->search($keyword_waris);
		} else {
			$waris = $this->warisModel;
		}
		$model = new warisModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah waris | Admin Kelurahan Sapugarut',
			// 'waris' => $this->warisModel->getwaris()
			'list' => $list,
			'waris' => $this->warisModel->paginate(5, 'tb_waris'),
			'pager' => $this->warisModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminwaris'
		];

		return view('pages/admin/v_adminwaris', $data);
	}

	public function tambahwaris()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah waris | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahwaris', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_waris' =>  [
				'rules' => 'required|is_unique[tb_waris.judul_waris]',
				'errors' => [
					'required' => 'Judul waris harus diisi.',
					'is_unique' => 'Judul waris sudah terdaftar'
				]
			]
		]))
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminwaris/tambahwaris');
			// return redirect()->to('/adminwaris/tambahwaris')->withInput()->with('validation', $validation);
			return redirect()->to('/adminwaris/tambahwaris')->withInput();

		$slug = url_title($this->request->getVar('judul_waris'), '-', true);
		$this->warisModel->save([
			'judul_waris' => $this->request->getVar('judul_waris'),
			'slug_waris' => $slug,
			'isi_waris' => $this->request->getVar('isi_waris'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminwaris');
	}

	public function delete($id_waris)
	{
		// cari gambar berdasarkan id
		$waris = $this->warisModel->find($id_waris);


		$this->warisModel->delete($id_waris);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminwaris');
	}

	public function edit($slug_waris)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit waris | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'waris' => $this->warisModel->getwaris($slug_waris),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminwaris'
		];

		return view('pages/admin/v_editwaris', $data);
	}

	public function update($id_waris)
	{
		// cek judul
		$warisLama = $this->warisModel->getwaris($this->request->getVar('slug_waris'));
		if ($warisLama['judul_waris'] == $this->request->getVar('judul_waris')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_waris.judul_waris]';
		}
		// validasi input
		if (!$this->validate([
			'judul_waris' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul waris harus diisi.',
					'is_unique' => 'Judul waris sudah terdaftar'
				]
			]
		])) {
			return redirect()->to('/adminwaris/edit/' . $this->request->getVar('slug_waris'))->withInput();
		}

		$filefotowaris = $this->request->getFile('foto_waris');

		$slug_waris = url_title($this->request->getVar('judul_waris'), '-', true);
		$this->warisModel->save([
			'id_waris' => $id_waris,
			'judul_waris' => $this->request->getVar('judul_waris'),
			'slug_waris' => $slug_waris,
			'isi_waris' => $this->request->getVar('isi_waris')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminwaris');
	}
}
