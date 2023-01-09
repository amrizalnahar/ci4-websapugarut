<?php

namespace App\Controllers;

use App\Models\adminModel;

class Admin extends BaseController
{
	protected $db, $builder, $adminModel;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->builder = $this->db->table('users');
		$this->adminModel = new adminModel();
	}

	public function index()
	{
		// $users = new \Myth\Auth\Models\UserModel();
		// $data['users'] = $users->findAll();
		$this->builder->select('users.id as userid, username, email, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$query = $this->builder->get();
		// $this->data['currentAdminMenu'] = 'admin';
		// $this->data['currentAdminSubAdmin'] = 'admin';
		$data = [
			'title' => 'Admin | Admin Kelurahan Sapugarut',
			'currentAdminMenu' => 'admin',
			'currentAdminSubMenu' => 'admin',
		];
		$data['users'] = $query->getResult();


		return view('pages/admin/v_admin', $data);
	}

	public function detail($id = 0)
	{
		$this->builder->select('users.id as userid, username, email,fullname, user_image, name');
		$this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
		$this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$this->builder->where('users.id', $id);
		$query = $this->builder->get();
		$data = [
			'title' => 'User Detail | Admin Kelurahan Sapugarut',
			'currentAdminMenu' => 'admin',
			'currentAdminSubMenu' => 'admin',
		];
		$data['user'] = $query->getRow();

		if (empty($data['user'])) {
			return redirect()->to('/admin');
		}

		return view('pages/admin/v_detail', $data);
	}

	public function delete($id)
	{
		// cari gambar berdasarkan id
		$admin = $this->adminModel->find($id);
		$this->builder->where('users.id', $id);

		// cek jika file gambarnya default.png
		if ($admin['user_image'] != 'default.svg') {
			// hapus gambar
			unlink('img/' . $admin['user_image']);
		}

		$this->adminModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/admin');
	}
}
