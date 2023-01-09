<?php

namespace App\Controllers;

use App\Models\ktpModel;

class AdminKtp extends BaseController
{
	// menupublik_ktp = nama tabel di database sapugarut
	protected $ktpModel;
	public function __construct()
	{
		// ktpModel nama variabel di menupublik_ktp
		$this->ktpModel  = new ktpModel();
	}

	public function index()
	{
		helper('text');
		// $ktp = $this->ktpModel->findAll();
		$currentPage = $this->request->getVar('page_tb_ktp') ?  $this->request->getVar('page_tb_ktp')  : 1;

		// Searching
		$keyword_ktp = $this->request->getVar('keyword_ktp');
		if ($keyword_ktp) {
			$ktp = $this->ktpModel->search($keyword_ktp);
		} else {
			$ktp = $this->ktpModel;
		}
		$model = new ktpModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah ktp | Admin Kelurahan Sapugarut',
			// 'ktp' => $this->ktpModel->getktp()
			'list' => $list,
			'ktp' => $this->ktpModel->paginate(5, 'tb_ktp'),
			'pager' => $this->ktpModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminktp'
		];

		return view('pages/admin/v_adminktp', $data);
	}

	public function tambahktp()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah ktp | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahktp', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_ktp' =>  [
				'rules' => 'required|is_unique[tb_ktp.judul_ktp]',
				'errors' => [
					'required' => 'Judul ktp harus diisi.',
					'is_unique' => 'Judul ktp sudah terdaftar'
				]
			]
		]))
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminktp/tambahktp');
			// return redirect()->to('/adminktp/tambahktp')->withInput()->with('validation', $validation);
			return redirect()->to('/adminktp/tambahktp')->withInput();

		$slug = url_title($this->request->getVar('judul_ktp'), '-', true);
		$this->ktpModel->save([
			'judul_ktp' => $this->request->getVar('judul_ktp'),
			'slug_ktp' => $slug,
			'isi_ktp' => $this->request->getVar('isi_ktp'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminktp');
	}

	public function delete($id_ktp)
	{
		// cari gambar berdasarkan id
		$ktp = $this->ktpModel->find($id_ktp);


		$this->ktpModel->delete($id_ktp);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminktp');
	}

	public function edit($slug_ktp)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit ktp | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'ktp' => $this->ktpModel->getktp($slug_ktp),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminktp'
		];

		return view('pages/admin/v_editktp', $data);
	}

	public function update($id_ktp)
	{
		// cek judul
		$ktpLama = $this->ktpModel->getktp($this->request->getVar('slug_ktp'));
		if ($ktpLama['judul_ktp'] == $this->request->getVar('judul_ktp')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_ktp.judul_ktp]';
		}
		// validasi input
		if (!$this->validate([
			'judul_ktp' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul ktp harus diisi.',
					'is_unique' => 'Judul ktp sudah terdaftar'
				]
			]
		])) {
			return redirect()->to('/adminktp/edit/' . $this->request->getVar('slug_ktp'))->withInput();
		}

		$filefotoktp = $this->request->getFile('foto_ktp');

		$slug_ktp = url_title($this->request->getVar('judul_ktp'), '-', true);
		$this->ktpModel->save([
			'id_ktp' => $id_ktp,
			'judul_ktp' => $this->request->getVar('judul_ktp'),
			'slug_ktp' => $slug_ktp,
			'isi_ktp' => $this->request->getVar('isi_ktp')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminktp');
	}
}
