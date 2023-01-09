<?php

namespace App\Controllers;

use App\Models\sktmModel;

class AdminSktm extends BaseController
{
	// menupublik_sktm = nama tabel di database sapugarut
	protected $sktmModel;
	public function __construct()
	{
		// sktmModel nama variabel di menupublik_sktm
		$this->sktmModel  = new sktmModel();
	}

	public function index()
	{
		helper('text');
		// $sktm = $this->sktmModel->findAll();
		$currentPage = $this->request->getVar('page_tb_sktm') ?  $this->request->getVar('page_tb_sktm')  : 1;

		// Searching
		$keyword_sktm = $this->request->getVar('keyword_sktm');
		if ($keyword_sktm) {
			$sktm = $this->sktmModel->search($keyword_sktm);
		} else {
			$sktm = $this->sktmModel;
		}
		$model = new sktmModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah sktm | Admin Kelurahan Sapugarut',
			// 'sktm' => $this->sktmModel->getsktm()
			'list' => $list,
			'sktm' => $this->sktmModel->paginate(5, 'tb_sktm'),
			'pager' => $this->sktmModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminsktm'
		];

		return view('pages/admin/v_adminsktm', $data);
	}

	public function tambahsktm()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah sktm | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahsktm', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_sktm' =>  [
				'rules' => 'required|is_unique[tb_sktm.judul_sktm]',
				'errors' => [
					'required' => 'Judul sktm harus diisi.',
					'is_unique' => 'Judul sktm sudah terdaftar'
				]
			]
		]))
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminsktm/tambahsktm');
			// return redirect()->to('/adminsktm/tambahsktm')->withInput()->with('validation', $validation);
			return redirect()->to('/adminsktm/tambahsktm')->withInput();

		$slug = url_title($this->request->getVar('judul_sktm'), '-', true);
		$this->sktmModel->save([
			'judul_sktm' => $this->request->getVar('judul_sktm'),
			'slug_sktm' => $slug,
			'isi_sktm' => $this->request->getVar('isi_sktm'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminsktm');
	}

	public function delete($id_sktm)
	{
		// cari gambar berdasarkan id
		$sktm = $this->sktmModel->find($id_sktm);


		$this->sktmModel->delete($id_sktm);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminsktm');
	}

	public function edit($slug_sktm)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit sktm | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'sktm' => $this->sktmModel->getsktm($slug_sktm),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminsktm'
		];

		return view('pages/admin/v_editsktm', $data);
	}

	public function update($id_sktm)
	{
		// cek judul
		$sktmLama = $this->sktmModel->getsktm($this->request->getVar('slug_sktm'));
		if ($sktmLama['judul_sktm'] == $this->request->getVar('judul_sktm')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_sktm.judul_sktm]';
		}
		// validasi input
		if (!$this->validate([
			'judul_sktm' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul sktm harus diisi.',
					'is_unique' => 'Judul sktm sudah terdaftar'
				]
			]
		])) {
			return redirect()->to('/adminsktm/edit/' . $this->request->getVar('slug_sktm'))->withInput();
		}

		$filefotosktm = $this->request->getFile('foto_sktm');

		$slug_sktm = url_title($this->request->getVar('judul_sktm'), '-', true);
		$this->sktmModel->save([
			'id_sktm' => $id_sktm,
			'judul_sktm' => $this->request->getVar('judul_sktm'),
			'slug_sktm' => $slug_sktm,
			'isi_sktm' => $this->request->getVar('isi_sktm')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminsktm');
	}
}
