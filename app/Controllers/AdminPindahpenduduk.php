<?php

namespace App\Controllers;

use App\Models\pindahpendudukModel;

class AdminPindahpenduduk extends BaseController
{
	// menupublik_pindahpenduduk = nama tabel di database sapugarut
	protected $pindahpendudukModel;
	public function __construct()
	{
		// pindahpendudukModel nama variabel di menupublik_pindahpenduduk
		$this->pindahpendudukModel  = new pindahpendudukModel();
	}

	public function index()
	{
		helper('text');
		// $pindahpenduduk = $this->pindahpendudukModel->findAll();
		$currentPage = $this->request->getVar('page_tb_pindahpenduduk') ?  $this->request->getVar('page_tb_pindahpenduduk')  : 1;

		// Searching
		$keyword_pindahpenduduk = $this->request->getVar('keyword_pindahpenduduk');
		if ($keyword_pindahpenduduk) {
			$pindahpenduduk = $this->pindahpendudukModel->search($keyword_pindahpenduduk);
		} else {
			$pindahpenduduk = $this->pindahpendudukModel;
		}
		$model = new pindahpendudukModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah pindahpenduduk | Admin Kelurahan Sapugarut',
			// 'pindahpenduduk' => $this->pindahpendudukModel->getpindahpenduduk()
			'list' => $list,
			'pindahpenduduk' => $this->pindahpendudukModel->paginate(5, 'tb_pindahpenduduk'),
			'pager' => $this->pindahpendudukModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminpindahpenduduk'
		];

		return view('pages/admin/v_adminpindahpenduduk', $data);
	}

	public function tambahpindahpenduduk()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah pindahpenduduk | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahpindahpenduduk', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_pindahpenduduk' =>  [
				'rules' => 'required|is_unique[tb_pindahpenduduk.judul_pindahpenduduk]',
				'errors' => [
					'required' => 'Judul pindahpenduduk harus diisi.',
					'is_unique' => 'Judul pindahpenduduk sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminpindahpenduduk/tambahpindahpenduduk');
			// return redirect()->to('/adminpindahpenduduk/tambahpindahpenduduk')->withInput()->with('validation', $validation);
			return redirect()->to('/adminpindahpenduduk/tambahpindahpenduduk')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_pindahpenduduk'), '-', true);
		$this->pindahpendudukModel->save([
			'judul_pindahpenduduk' => $this->request->getVar('judul_pindahpenduduk'),
			'slug_pindahpenduduk' => $slug,
			'isi_pindahpenduduk' => $this->request->getVar('isi_pindahpenduduk'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminpindahpenduduk');
	}

	public function delete($id_pindahpenduduk)
	{
		// cari gambar berdasarkan id
		$pindahpenduduk = $this->pindahpendudukModel->find($id_pindahpenduduk);

		$this->pindahpendudukModel->delete($id_pindahpenduduk);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminpindahpenduduk');
	}

	public function edit($slug_pindahpenduduk)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit pindahpenduduk | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'pindahpenduduk' => $this->pindahpendudukModel->getpindahpenduduk($slug_pindahpenduduk),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminpindahpenduduk'
		];

		return view('pages/admin/v_editpindahpenduduk', $data);
	}

	public function update($id_pindahpenduduk)
	{
		// cek judul
		$pindahpendudukLama = $this->pindahpendudukModel->getpindahpenduduk($this->request->getVar('slug_pindahpenduduk'));
		if ($pindahpendudukLama['judul_pindahpenduduk'] == $this->request->getVar('judul_pindahpenduduk')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_pindahpenduduk.judul_pindahpenduduk]';
		}
		// validasi input
		if (!$this->validate([
			'judul_pindahpenduduk' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul pindahpenduduk harus diisi.',
					'is_unique' => 'Judul pindahpenduduk sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/adminpindahpenduduk/edit/' . $this->request->getVar('slug_pindahpenduduk'))->withInput();
		}

		$slug_pindahpenduduk = url_title($this->request->getVar('judul_pindahpenduduk'), '-', true);
		$this->pindahpendudukModel->save([
			'id_pindahpenduduk' => $id_pindahpenduduk,
			'judul_pindahpenduduk' => $this->request->getVar('judul_pindahpenduduk'),
			'slug_pindahpenduduk' => $slug_pindahpenduduk,
			'isi_pindahpenduduk' => $this->request->getVar('isi_pindahpenduduk'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminpindahpenduduk');
	}
}
