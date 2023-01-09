<?php

namespace App\Controllers;

use App\Models\komoditiModel;

class Adminkomoditi extends BaseController
{
	// menupublik_komoditi = nama tabel di database sapugarut
	protected $komoditiModel;
	public function __construct()
	{
		// komoditiModel nama variabel di menupublik_komoditi
		$this->komoditiModel  = new komoditiModel();
	}

	public function index()
	{
		helper('text');
		// $komoditi = $this->komoditiModel->findAll();
		$currentPage = $this->request->getVar('page_tb_komoditiunggulan') ?  $this->request->getVar('page_tb_komoditiunggulan')  : 1;

		// Searching
		$keyword_komoditi = $this->request->getVar('keyword_komoditi');
		if ($keyword_komoditi) {
			$komoditi = $this->komoditiModel->search($keyword_komoditi);
		} else {
			$komoditi = $this->komoditiModel;
		}

		$data = [
			'title' => 'Tambah komoditi | Admin Kelurahan Sapugarut',
			'komoditi' => $this->komoditiModel->paginate(5, 'tb_komoditiunggulan'),
			'pager' => $this->komoditiModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'potensidesa',
			'currentAdminSubMenu' => 'adminkomoditi'
		];

		return view('pages/admin/v_adminkomoditi', $data);
	}

	public function tambahkomoditi()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah komoditi | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'currentAdminMenu' => 'adminkomoditi',
			'currentAdminSubMenu' => 'adminkomoditi'
		];

		return view('pages/admin/v_tambahkomoditi', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_komoditi' =>  [
				'rules' => 'required|is_unique[tb_komoditiunggulan.judul_komoditi]',
				'errors' => [
					'required' => 'Judul komoditi harus diisi.',
					'is_unique' => 'Judul komoditi sudah terdaftar'
				]
			],
			'foto_komoditi' => [
				'rules' => 'uploaded[foto_komoditi]|max_size[foto_komoditi,1024]|is_image[foto_komoditi]|mime_in[foto_komoditi,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'Pilih gambar terlebih dahulu',
					'max_size' => 'Ukuran gambar melebihi 1 MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminkomoditi/tambahkomoditi');
			// return redirect()->to('/adminkomoditi/tambahkomoditi')->withInput()->with('validation', $validation);
			return redirect()->to('/adminkomoditi/tambahkomoditi')->withInput();
		}
		// ambil gambar
		$fileFotokomoditi = $this->request->getFile('foto_komoditi');
		// generate nama fotokomoditi random
		$namaFotokomoditi = $fileFotokomoditi->getRandomName();
		// pindahkan file ke folder img
		$fileFotokomoditi->move('img', $namaFotokomoditi);

		$slug = url_title($this->request->getVar('judul_komoditi'), '-', true);
		$this->komoditiModel->save([
			'judul_komoditi' => $this->request->getVar('judul_komoditi'),
			'slug_komoditi' => $slug,
			'isi_komoditi' => $this->request->getVar('isi_komoditi'),
			'foto_komoditi' => $namaFotokomoditi
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminkomoditi');
	}

	public function delete($id_komoditi)
	{
		// cari gambar berdasarkan id
		$komoditi = $this->komoditiModel->find($id_komoditi);

		// cek jika file gambarnya default.png
		if ($komoditi['foto_komoditi'] != 'default.png') {
			// hapus gambar
			unlink('img/' . $komoditi['foto_komoditi']);
		}

		$this->komoditiModel->delete($id_komoditi);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminkomoditi');
	}

	public function edit($slug_komoditi)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit komoditi | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'komoditi' => $this->komoditiModel->getkomoditi($slug_komoditi),
			'currentAdminMenu' => 'adminkomoditi',
			'currentAdminSubMenu' => 'adminkomoditi',
		];

		return view('pages/admin/v_editkomoditi', $data);
	}

	public function update($id_komoditi)
	{
		// cek judul
		$komoditiLama = $this->komoditiModel->getkomoditi($this->request->getVar('slug_komoditi'));
		if ($komoditiLama['judul_komoditi'] == $this->request->getVar('judul_komoditi')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_komoditiunggulan.judul_komoditi]';
		}
		// validasi input
		if (!$this->validate([
			'judul_komoditi' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul komoditi harus diisi.',
					'is_unique' => 'Judul komoditi sudah terdaftar'
				]
			],
			'foto_komoditi' => [
				'rules' => 'uploaded[foto_komoditi]|max_size[foto_komoditi,1024]|is_image[foto_komoditi]|mime_in[foto_komoditi,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'Pilih gambar terlebih dahulu',
					'max_size' => 'Ukuran gambar melebihi 1 MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/adminkomoditi/edit/' . $this->request->getVar('slug_komoditi'))->withInput();
		}

		$filefotokomoditi = $this->request->getFile('foto_komoditi');

		// cek gambar, apakah tetap gambar lama
		if ($filefotokomoditi->getError() == 4) {
			$namaFotokomoditi = $this->request->getVar('foto_komoditiLama');
		} else {
			// generate nama file random
			$namaFotokomoditi = $filefotokomoditi->getRandomName();
			// pindahkan gambar
			$filefotokomoditi->move('img', $namaFotokomoditi);
			// hapus file yang lama
			unlink('img/' . $this->request->getVar('foto_komoditiLama'));
		}

		$slug_komoditi = url_title($this->request->getVar('judul_komoditi'), '-', true);
		$this->komoditiModel->save([
			'id_komoditi' => $id_komoditi,
			'judul_komoditi' => $this->request->getVar('judul_komoditi'),
			'slug_komoditi' => $slug_komoditi,
			'isi_komoditi' => $this->request->getVar('isi_komoditi'),
			'foto_komoditi' => $namaFotokomoditi
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminkomoditi');
	}
}
