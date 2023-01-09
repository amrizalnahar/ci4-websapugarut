<?php

namespace App\Controllers;

use App\Models\produkModel;

class AdminProduk extends BaseController
{
	// menupublik_produk = nama tabel di database sapugarut
	protected $produkModel;
	public function __construct()
	{
		// produkModel nama variabel di menupublik_produk
		$this->produkModel  = new produkModel();
	}

	public function index()
	{
		helper('text');
		// $produk = $this->produkModel->findAll();
		$currentPage = $this->request->getVar('page_tb_produkunggulan') ?  $this->request->getVar('page_tb_produkunggulan')  : 1;

		// Searching
		$keyword_produk = $this->request->getVar('keyword_produk');
		if ($keyword_produk) {
			$produk = $this->produkModel->search($keyword_produk);
		} else {
			$produk = $this->produkModel;
		}

		$data = [
			'title' => 'Tambah produk | Admin Kelurahan Sapugarut',
			// 'produk' => $this->produkModel->getproduk()
			'produk' => $this->produkModel->paginate(5, 'tb_produkunggulan'),
			'pager' => $this->produkModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'potensidesa',
			'currentAdminSubMenu' => 'adminproduk'
		];

		return view('pages/admin/v_adminproduk', $data);
	}

	public function tambahproduk()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah produk | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'currentAdminMenu' => 'potensidesa',
			'currentAdminSubMenu' => 'adminproduk'
		];

		return view('pages/admin/v_tambahproduk', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_produk' =>  [
				'rules' => 'required|is_unique[tb_produkunggulan.judul_produk]',
				'errors' => [
					'required' => 'Judul produk harus diisi.',
					'is_unique' => 'Judul produk sudah terdaftar'
				]
			],
			'foto_produk' => [
				'rules' => 'uploaded[foto_produk]|max_size[foto_produk,1024]|is_image[foto_produk]|mime_in[foto_produk,image/jpg,image/jpeg,image/png]',
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
			// return redirect()->to('/adminproduk/tambahproduk');
			// return redirect()->to('/adminproduk/tambahproduk')->withInput()->with('validation', $validation);
			return redirect()->to('/adminproduk/tambahproduk')->withInput();
		}
		// ambil gambar
		$fileFotoproduk = $this->request->getFile('foto_produk');
		// generate nama fotoproduk random
		$namaFotoproduk = $fileFotoproduk->getRandomName();
		// pindahkan file ke folder img
		$fileFotoproduk->move('img', $namaFotoproduk);

		$slug = url_title($this->request->getVar('judul_produk'), '-', true);
		$this->produkModel->save([
			'judul_produk' => $this->request->getVar('judul_produk'),
			'slug_produk' => $slug,
			'isi_produk' => $this->request->getVar('isi_produk'),
			'foto_produk' => $namaFotoproduk
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminproduk');
	}

	public function delete($id_produk)
	{
		// cari gambar berdasarkan id
		$produk = $this->produkModel->find($id_produk);

		// cek jika file gambarnya default.png
		if ($produk['foto_produk'] != 'default.png') {
			// hapus gambar
			unlink('img/' . $produk['foto_produk']);
		}

		$this->produkModel->delete($id_produk);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminproduk');
	}

	public function edit($slug_produk)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit produk | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'produk' => $this->produkModel->getproduk($slug_produk),
			'currentAdminMenu' => 'potensidesa',
			'currentAdminSubMenu' => 'adminproduk'
		];

		return view('pages/admin/v_editproduk', $data);
	}

	public function update($id_produk)
	{
		// cek judul
		$produkLama = $this->produkModel->getproduk($this->request->getVar('slug_produk'));
		if ($produkLama['judul_produk'] == $this->request->getVar('judul_produk')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_produkunggulan.judul_produk]';
		}
		// validasi input
		if (!$this->validate([
			'judul_produk' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul produk harus diisi.',
					'is_unique' => 'Judul produk sudah terdaftar'
				]
			],
			'foto_produk' => [
				'rules' => 'uploaded[foto_produk]|max_size[foto_produk,1024]|is_image[foto_produk]|mime_in[foto_produk,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'Pilih gambar terlebih dahulu',
					'max_size' => 'Ukuran gambar melebihi 1 MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/adminproduk/edit/' . $this->request->getVar('slug_produk'))->withInput();
		}

		$filefotoproduk = $this->request->getFile('foto_produk');

		// cek gambar, apakah tetap gambar lama
		if ($filefotoproduk->getError() == 4) {
			$namaFotoproduk = $this->request->getVar('foto_produkLama');
		} else {
			// generate nama file random
			$namaFotoproduk = $filefotoproduk->getRandomName();
			// pindahkan gambar
			$filefotoproduk->move('img', $namaFotoproduk);
			// hapus file yang lama
			unlink('img/' . $this->request->getVar('foto_produkLama'));
		}

		$slug_produk = url_title($this->request->getVar('judul_produk'), '-', true);
		$this->produkModel->save([
			'id_produk' => $id_produk,
			'judul_produk' => $this->request->getVar('judul_produk'),
			'slug_produk' => $slug_produk,
			'isi_produk' => $this->request->getVar('isi_produk'),
			'foto_produk' => $namaFotoproduk
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminproduk');
	}
}
