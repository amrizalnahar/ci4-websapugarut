<?php

namespace App\Controllers;

use App\Models\jaminanpersalinanModel;

class AdminJaminanpersalinan extends BaseController
{
	// menupublik_jaminanpersalinan = nama tabel di database sapugarut
	protected $jaminanpersalinanModel;
	public function __construct()
	{
		// jaminanpersalinanModel nama variabel di menupublik_jaminanpersalinan
		$this->jaminanpersalinanModel  = new jaminanpersalinanModel();
	}

	public function index()
	{
		helper('text');
		// $jaminanpersalinan = $this->jaminanpersalinanModel->findAll();
		$currentPage = $this->request->getVar('page_tb_jaminanpersalinan') ?  $this->request->getVar('page_tb_jaminanpersalinan')  : 1;

		// Searching
		$keyword_jaminanpersalinan = $this->request->getVar('keyword_jaminanpersalinan');
		if ($keyword_jaminanpersalinan) {
			$jaminanpersalinan = $this->jaminanpersalinanModel->search($keyword_jaminanpersalinan);
		} else {
			$jaminanpersalinan = $this->jaminanpersalinanModel;
		}
		$model = new jaminanpersalinanModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah jaminanpersalinan | Admin Kelurahan Sapugarut',
			// 'jaminanpersalinan' => $this->jaminanpersalinanModel->getjaminanpersalinan()
			'list' => $list,
			'jaminanpersalinan' => $this->jaminanpersalinanModel->paginate(5, 'tb_jaminanpersalinan'),
			'pager' => $this->jaminanpersalinanModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminjaminanpersalinan'
		];

		return view('pages/admin/v_adminjaminanpersalinan', $data);
	}

	public function tambahjaminanpersalinan()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah jaminanpersalinan | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahjaminanpersalinan', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_jaminanpersalinan' =>  [
				'rules' => 'required|is_unique[tb_jaminanpersalinan.judul_jaminanpersalinan]',
				'errors' => [
					'required' => 'Judul jaminanpersalinan harus diisi.',
					'is_unique' => 'Judul jaminanpersalinan sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminjaminanpersalinan/tambahjaminanpersalinan');
			// return redirect()->to('/adminjaminanpersalinan/tambahjaminanpersalinan')->withInput()->with('validation', $validation);
			return redirect()->to('/adminjaminanpersalinan/tambahjaminanpersalinan')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_jaminanpersalinan'), '-', true);
		$this->jaminanpersalinanModel->save([
			'judul_jaminanpersalinan' => $this->request->getVar('judul_jaminanpersalinan'),
			'slug_jaminanpersalinan' => $slug,
			'isi_jaminanpersalinan' => $this->request->getVar('isi_jaminanpersalinan'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminjaminanpersalinan');
	}

	public function delete($id_jaminanpersalinan)
	{
		// cari gambar berdasarkan id
		$jaminanpersalinan = $this->jaminanpersalinanModel->find($id_jaminanpersalinan);

		$this->jaminanpersalinanModel->delete($id_jaminanpersalinan);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminjaminanpersalinan');
	}

	public function edit($slug_jaminanpersalinan)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit jaminanpersalinan | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'jaminanpersalinan' => $this->jaminanpersalinanModel->getjaminanpersalinan($slug_jaminanpersalinan),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminjaminanpersalinan'
		];

		return view('pages/admin/v_editjaminanpersalinan', $data);
	}

	public function update($id_jaminanpersalinan)
	{
		// cek judul
		$jaminanpersalinanLama = $this->jaminanpersalinanModel->getjaminanpersalinan($this->request->getVar('slug_jaminanpersalinan'));
		if ($jaminanpersalinanLama['judul_jaminanpersalinan'] == $this->request->getVar('judul_jaminanpersalinan')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_jaminanpersalinan.judul_jaminanpersalinan]';
		}
		// validasi input
		if (!$this->validate([
			'judul_jaminanpersalinan' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul jaminanpersalinan harus diisi.',
					'is_unique' => 'Judul jaminanpersalinan sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/adminjaminanpersalinan/edit/' . $this->request->getVar('slug_jaminanpersalinan'))->withInput();
		}

		$slug_jaminanpersalinan = url_title($this->request->getVar('judul_jaminanpersalinan'), '-', true);
		$this->jaminanpersalinanModel->save([
			'id_jaminanpersalinan' => $id_jaminanpersalinan,
			'judul_jaminanpersalinan' => $this->request->getVar('judul_jaminanpersalinan'),
			'slug_jaminanpersalinan' => $slug_jaminanpersalinan,
			'isi_jaminanpersalinan' => $this->request->getVar('isi_jaminanpersalinan'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminjaminanpersalinan');
	}
}
