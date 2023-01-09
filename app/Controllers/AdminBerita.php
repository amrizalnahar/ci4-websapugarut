<?php

namespace App\Controllers;

use App\Models\beritaModel;

class AdminBerita extends BaseController
{
	// menupublik_berita = nama tabel di database sapugarut
	protected $beritaModel;

	public function __construct()
	{
		// beritaModel nama variabel di menupublik_berita
		$this->beritaModel  = new beritaModel();
	}

	public function index()
	{
		helper('text');
		// $berita = $this->beritaModel->findAll();
		$currentPage = $this->request->getVar('page_tb_berita') ?  $this->request->getVar('page_tb_berita')  : 1;

		// Searching
		$keyword_berita = $this->request->getVar('keyword_berita');
		if ($keyword_berita) {
			$berita = $this->beritaModel->search($keyword_berita);
		} else {
			$berita = $this->beritaModel;
		}
		$model = new beritaModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah Berita | Admin Kelurahan Sapugarut',
			// 'berita' => $this->beritaModel->getBerita()
			'list' => $list,
			'berita' => $this->beritaModel->paginate(5, 'tb_berita'),
			'pager' => $this->beritaModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'menupublik',
			'currentAdminSubMenu' => 'adminberita'
		];

		return view('pages/admin/v_adminberita', $data);
	}

	public function tambahberita()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah Berita | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'currentAdminMenu' => 'menupublik',
			'currentAdminSubMenu' => 'adminberita'
		];

		return view('pages/admin/v_tambahberita', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_berita' =>  [
				'rules' => 'required|is_unique[tb_berita.judul_berita]',
				'errors' => [
					'required' => 'Judul berita harus diisi.',
					'is_unique' => 'Judul berita sudah terdaftar'
				]
			],
			'foto_berita' => [
				'rules' => 'uploaded[foto_berita]|max_size[foto_berita,1024]|is_image[foto_berita]|mime_in[foto_berita,image/jpg,image/jpeg,image/png]',
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
			// return redirect()->to('/adminberita/tambahberita');
			// return redirect()->to('/adminberita/tambahberita')->withInput()->with('validation', $validation);
			return redirect()->to('/adminberita/tambahberita')->withInput();
		}
		// ambil gambar
		$fileFotoBerita = $this->request->getFile('foto_berita');
		// generate nama fotoberita random
		$namaFotoBerita = $fileFotoBerita->getRandomName();
		// pindahkan file ke folder img
		$fileFotoBerita->move('img', $namaFotoBerita);

		$slug = url_title($this->request->getVar('judul_berita'), '-', true);
		$this->beritaModel->save([
			'judul_berita' => $this->request->getVar('judul_berita'),
			'slug_berita' => $slug,
			'isi_berita' => $this->request->getVar('isi_berita'),
			'foto_berita' => $namaFotoBerita
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminberita');
	}

	public function delete($id_berita)
	{
		// cari gambar berdasarkan id
		$berita = $this->beritaModel->find($id_berita);

		// cek jika file gambarnya default.png
		if ($berita['foto_berita'] != 'default.png') {
			// hapus gambar
			unlink('img/' . $berita['foto_berita']);
		}

		$this->beritaModel->delete($id_berita);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminberita');
	}

	public function edit($slug_berita)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit Berita | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'berita' => $this->beritaModel->getBerita($slug_berita),
			'currentAdminMenu' => 'menupublik',
			'currentAdminSubMenu' => 'adminberita'
		];

		return view('pages/admin/v_editberita', $data);
	}

	public function update($id_berita)
	{
		// cek judul
		$beritaLama = $this->beritaModel->getBerita($this->request->getVar('slug_berita'));

		if ($beritaLama['judul_berita'] == $this->request->getVar('judul_berita')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_berita.judul_berita]';
		}
		// validasi input
		if (!$this->validate([
			'judul_berita' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul berita harus diisi.',
					'is_unique' => 'Judul berita sudah terdaftar'
				]
			],
			'foto_berita' => [
				'rules' => 'uploaded[foto_berita]|max_size[foto_berita,1024]|is_image[foto_berita]|mime_in[foto_berita,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'Pilih gambar terlebih dahulu',
					'max_size' => 'Ukuran gambar melebihi 1 MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/adminberita/edit/' . $this->request->getVar('slug_berita'))->withInput();
		}

		$filefotoBerita = $this->request->getFile('foto_berita');

		// cek gambar, apakah tetap gambar lama
		if ($filefotoBerita->getError() == 4) {
			$namaFotoBerita = $this->request->getVar('foto_beritaLama');
		} else {
			// generate nama file random
			$namaFotoBerita = $filefotoBerita->getRandomName();
			// pindahkan gambar
			$filefotoBerita->move('img', $namaFotoBerita);
			// hapus file yang lama
			unlink('img/' . $this->request->getVar('foto_beritaLama'));
		}

		$slug_berita = url_title($this->request->getVar('judul_berita'), '-', true);
		$this->beritaModel->save([
			'id_berita' => $id_berita,
			'judul_berita' => $this->request->getVar('judul_berita'),
			'slug_berita' => $slug_berita,
			'isi_berita' => $this->request->getVar('isi_berita'),
			'foto_berita' => $namaFotoBerita
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminberita');
	}
}
