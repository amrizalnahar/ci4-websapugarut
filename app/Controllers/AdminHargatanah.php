<?php

namespace App\Controllers;

use App\Models\hargatanahModel;

class AdminHargatanah extends BaseController
{
	// menupublik_hargatanah = nama tabel di database sapugarut
	protected $hargatanahModel;
	public function __construct()
	{
		// hargatanahModel nama variabel di menupublik_hargatanah
		$this->hargatanahModel  = new hargatanahModel();
	}

	public function index()
	{
		helper('text');
		// $hargatanah = $this->hargatanahModel->findAll();
		$currentPage = $this->request->getVar('page_tb_hargatanah') ?  $this->request->getVar('page_tb_hargatanah')  : 1;

		// Searching
		$keyword_hargatanah = $this->request->getVar('keyword_hargatanah');
		if ($keyword_hargatanah) {
			$hargatanah = $this->hargatanahModel->search($keyword_hargatanah);
		} else {
			$hargatanah = $this->hargatanahModel;
		}
		$model = new hargatanahModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah hargatanah | Admin Kelurahan Sapugarut',
			// 'hargatanah' => $this->hargatanahModel->gethargatanah()
			'list' => $list,
			'hargatanah' => $this->hargatanahModel->paginate(5, 'tb_hargatanah'),
			'pager' => $this->hargatanahModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminhargatanah'
		];

		return view('pages/admin/v_adminhargatanah', $data);
	}

	public function tambahhargatanah()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah hargatanah | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahhargatanah', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_hargatanah' =>  [
				'rules' => 'required|is_unique[tb_hargatanah.judul_hargatanah]',
				'errors' => [
					'required' => 'Judul hargatanah harus diisi.',
					'is_unique' => 'Judul hargatanah sudah terdaftar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminhargatanah/tambahhargatanah');
			// return redirect()->to('/adminhargatanah/tambahhargatanah')->withInput()->with('validation', $validation);
			return redirect()->to('/adminhargatanah/tambahhargatanah')->withInput();
		}

		$slug = url_title($this->request->getVar('judul_hargatanah'), '-', true);
		$this->hargatanahModel->save([
			'judul_hargatanah' => $this->request->getVar('judul_hargatanah'),
			'slug_hargatanah' => $slug,
			'isi_hargatanah' => $this->request->getVar('isi_hargatanah'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminhargatanah');
	}

	public function delete($id_hargatanah)
	{
		// cari gambar berdasarkan id
		$hargatanah = $this->hargatanahModel->find($id_hargatanah);

		$this->hargatanahModel->delete($id_hargatanah);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminhargatanah');
	}

	public function edit($slug_hargatanah)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit hargatanah | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'hargatanah' => $this->hargatanahModel->gethargatanah($slug_hargatanah),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminhargatanah'
		];

		return view('pages/admin/v_edithargatanah', $data);
	}

	public function update($id_hargatanah)
	{
		// cek judul
		$hargatanahLama = $this->hargatanahModel->gethargatanah($this->request->getVar('slug_hargatanah'));
		if ($hargatanahLama['judul_hargatanah'] == $this->request->getVar('judul_hargatanah')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_hargatanah.judul_hargatanah]';
		}
		// validasi input
		if (!$this->validate([
			'judul_hargatanah' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul hargatanah harus diisi.',
					'is_unique' => 'Judul hargatanah sudah terdaftar'
				]
			],

		])) {
			return redirect()->to('/adminhargatanah/edit/' . $this->request->getVar('slug_hargatanah'))->withInput();
		}

		$slug_hargatanah = url_title($this->request->getVar('judul_hargatanah'), '-', true);
		$this->hargatanahModel->save([
			'id_hargatanah' => $id_hargatanah,
			'judul_hargatanah' => $this->request->getVar('judul_hargatanah'),
			'slug_hargatanah' => $slug_hargatanah,
			'isi_hargatanah' => $this->request->getVar('isi_hargatanah'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminhargatanah');
	}
}
