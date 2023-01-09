<?php

namespace App\Controllers;

use App\Models\informasiModel;

class AdminInformasi extends BaseController
{
    // menupublik_informasi = nama tabel di database sapugarut
    protected $informasiModel;
    public function __construct()
    {
        // informasiModel nama variabel di menupublik_informasi
        $this->informasiModel  = new informasiModel();
    }

    public function index()
    {
        helper('text');
        // $informasi = $this->informasiModel->findAll();
        $currentPage = $this->request->getVar('page_tb_informasi') ?  $this->request->getVar('page_tb_informasi')  : 1;

        // Searching
        $keyword_informasi = $this->request->getVar('keyword_informasi');
        if ($keyword_informasi) {
            $informasi = $this->informasiModel->search($keyword_informasi);
        } else {
            $informasi = $this->informasiModel;
        }

        $data = [
            'title' => 'Tambah informasi | Admin Kelurahan Sapugarut',
            // 'informasi' => $this->informasiModel->getinformasi()
            'informasi' => $this->informasiModel->paginate(5, 'tb_informasi'),
            'pager' => $this->informasiModel->pager,
            'currentPage' => $currentPage,
            'currentAdminMenu' => 'menupublik',
            'currentAdminSubMenu' => 'admininformasi'
        ];

        return view('pages/admin/v_admininformasi', $data);
    }

    public function tambahinformasi()
    {
        // session(); dibasecontroller
        $data = [
            'title' => 'Form Tambah informasi | Admin Kelurahan Sapugarut',
            'validation' => \Config\Services::validation(),
            'currentAdminMenu' => 'menupublik',
            'currentAdminSubMenu' => 'admininformasi'
        ];

        return view('pages/admin/v_tambahinformasi', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul_informasi' =>  [
                'rules' => 'required|is_unique[tb_informasi.judul_informasi]',
                'errors' => [
                    'required' => 'Judul informasi harus diisi.',
                    'is_unique' => 'Judul informasi sudah terdaftar'
                ]
            ],
            'foto_informasi' => [
                'rules' => 'uploaded[foto_informasi]|max_size[foto_informasi,1024]|is_image[foto_informasi]|mime_in[foto_informasi,image/jpg,image/jpeg,image/png]',
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
            // return redirect()->to('/admininformasi/tambahinformasi');
            // return redirect()->to('/admininformasi/tambahinformasi')->withInput()->with('validation', $validation);
            return redirect()->to('/admininformasi/tambahinformasi')->withInput();
        }
        // ambil gambar
        $fileFotoinformasi = $this->request->getFile('foto_informasi');
        // generate nama fotoinformasi random
        $namaFotoinformasi = $fileFotoinformasi->getRandomName();
        // pindahkan file ke folder img
        $fileFotoinformasi->move('img', $namaFotoinformasi);

        $slug = url_title($this->request->getVar('judul_informasi'), '-', true);
        $this->informasiModel->save([
            'judul_informasi' => $this->request->getVar('judul_informasi'),
            'slug_informasi' => $slug,
            'isi_informasi' => $this->request->getVar('isi_informasi'),
            'foto_informasi' => $namaFotoinformasi
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admininformasi');
    }

    public function delete($id_informasi)
    {
        // cari gambar berdasarkan id
        $informasi = $this->informasiModel->find($id_informasi);

        // cek jika file gambarnya default.png
        if ($informasi['foto_informasi'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $informasi['foto_informasi']);
        }

        $this->informasiModel->delete($id_informasi);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admininformasi');
    }

    public function edit($slug_informasi)
    {
        // session(); dibasecontroller
        $data = [
            'title' => 'Form Edit informasi | Admin Kelurahan Sapugarut',
            'validation' => \Config\Services::validation(),
            'informasi' => $this->informasiModel->getinformasi($slug_informasi),
            'currentAdminMenu' => 'menupublik',
            'currentAdminSubMenu' => 'admininformasi'
        ];

        return view('pages/admin/v_editinformasi', $data);
    }

    public function update($id_informasi)
    {
        // cek judul
        $informasiLama = $this->informasiModel->getinformasi($this->request->getVar('slug_informasi'));
        if ($informasiLama['judul_informasi'] == $this->request->getVar('judul_informasi')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tb_informasi.judul_informasi]';
        }
        // validasi input
        if (!$this->validate([
            'judul_informasi' =>  [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul informasi harus diisi.',
                    'is_unique' => 'Judul informasi sudah terdaftar'
                ]
            ],
            'foto_informasi' => [
                'rules' => 'uploaded[foto_informasi]|max_size[foto_informasi,1024]|is_image[foto_informasi]|mime_in[foto_informasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar melebihi 1 MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admininformasi/edit/' . $this->request->getVar('slug_informasi'))->withInput();
        }

        $filefotoinformasi = $this->request->getFile('foto_informasi');

        // cek gambar, apakah tetap gambar lama
        if ($filefotoinformasi->getError() == 4) {
            $namaFotoinformasi = $this->request->getVar('foto_informasiLama');
        } else {
            // generate nama file random
            $namaFotoinformasi = $filefotoinformasi->getRandomName();
            // pindahkan gambar
            $filefotoinformasi->move('img', $namaFotoinformasi);
            // hapus file yang lama
            unlink('img/' . $this->request->getVar('foto_informasiLama'));
        }

        $slug_informasi = url_title($this->request->getVar('judul_informasi'), '-', true);
        $this->informasiModel->save([
            'id_informasi' => $id_informasi,
            'judul_informasi' => $this->request->getVar('judul_informasi'),
            'slug_informasi' => $slug_informasi,
            'isi_informasi' => $this->request->getVar('isi_informasi'),
            'foto_informasi' => $namaFotoinformasi
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admininformasi');
    }
}
