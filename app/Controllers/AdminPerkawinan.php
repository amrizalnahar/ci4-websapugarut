<?php

namespace App\Controllers;

use App\Models\perkawinanModel;

class AdminPerkawinan extends BaseController
{
	// menupublik_perkawinan = nama tabel di database sapugarut
	protected $perkawinanModel;
	public function __construct()
	{
		// perkawinanModel nama variabel di menupublik_perkawinan
		$this->perkawinanModel  = new perkawinanModel();
	}

	public function index()
	{
		helper('text');
		// $perkawinan = $this->perkawinanModel->findAll();
		$currentPage = $this->request->getVar('page_tb_perkawinan') ?  $this->request->getVar('page_tb_perkawinan')  : 1;

		// Searching
		$keyword_perkawinan = $this->request->getVar('keyword_perkawinan');
		if ($keyword_perkawinan) {
			$perkawinan = $this->perkawinanModel->search($keyword_perkawinan);
		} else {
			$perkawinan = $this->perkawinanModel;
		}
		$model = new perkawinanModel();
		$list = $model->listing();

		$data = [
			'title' => 'Tambah perkawinan | Admin Kelurahan Sapugarut',
			// 'perkawinan' => $this->perkawinanModel->getperkawinan()
			'list' => $list,
			'perkawinan' => $this->perkawinanModel->paginate(5, 'tb_perkawinan'),
			'pager' => $this->perkawinanModel->pager,
			'currentPage' => $currentPage,
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminperkawinan'
		];

		return view('pages/admin/v_adminperkawinan', $data);
	}

	public function tambahperkawinan()
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Tambah perkawinan | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation()
		];

		return view('pages/admin/v_tambahperkawinan', $data);
	}

	public function save()
	{
		// validasi input
		if (!$this->validate([
			'judul_perkawinan' =>  [
				'rules' => 'required|is_unique[tb_perkawinan.judul_perkawinan]',
				'errors' => [
					'required' => 'Judul perkawinan harus diisi.',
					'is_unique' => 'Judul perkawinan sudah terdaftar'
				]
			]
		]))
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/adminperkawinan/tambahperkawinan');
			// return redirect()->to('/adminperkawinan/tambahperkawinan')->withInput()->with('validation', $validation);
			return redirect()->to('/adminperkawinan/tambahperkawinan')->withInput();

		$slug = url_title($this->request->getVar('judul_perkawinan'), '-', true);
		$this->perkawinanModel->save([
			'judul_perkawinan' => $this->request->getVar('judul_perkawinan'),
			'slug_perkawinan' => $slug,
			'isi_perkawinan' => $this->request->getVar('isi_perkawinan'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/adminperkawinan');
	}

	public function delete($id_perkawinan)
	{
		// cari gambar berdasarkan id
		$perkawinan = $this->perkawinanModel->find($id_perkawinan);


		$this->perkawinanModel->delete($id_perkawinan);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/adminperkawinan');
	}

	public function edit($slug_perkawinan)
	{
		// session(); dibasecontroller
		$data = [
			'title' => 'Form Edit perkawinan | Admin Kelurahan Sapugarut',
			'validation' => \Config\Services::validation(),
			'perkawinan' => $this->perkawinanModel->getperkawinan($slug_perkawinan),
			'currentAdminMenu' => 'pelayananmasyarakat',
			'currentAdminSubMenu' => 'adminperkawinan'
		];

		return view('pages/admin/v_editperkawinan', $data);
	}

	public function update($id_perkawinan)
	{
		// cek judul
		$perkawinanLama = $this->perkawinanModel->getperkawinan($this->request->getVar('slug_perkawinan'));
		if ($perkawinanLama['judul_perkawinan'] == $this->request->getVar('judul_perkawinan')) {
			$rule_judul = 'required';
		} else {
			$rule_judul = 'required|is_unique[tb_perkawinan.judul_perkawinan]';
		}
		// validasi input
		if (!$this->validate([
			'judul_perkawinan' =>  [
				'rules' => $rule_judul,
				'errors' => [
					'required' => 'Judul perkawinan harus diisi.',
					'is_unique' => 'Judul perkawinan sudah terdaftar'
				]
			]
		])) {
			return redirect()->to('/adminperkawinan/edit/' . $this->request->getVar('slug_perkawinan'))->withInput();
		}

		$filefotoperkawinan = $this->request->getFile('foto_perkawinan');

		$slug_perkawinan = url_title($this->request->getVar('judul_perkawinan'), '-', true);
		$this->perkawinanModel->save([
			'id_perkawinan' => $id_perkawinan,
			'judul_perkawinan' => $this->request->getVar('judul_perkawinan'),
			'slug_perkawinan' => $slug_perkawinan,
			'isi_perkawinan' => $this->request->getVar('isi_perkawinan')
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/adminperkawinan');
	}
}
