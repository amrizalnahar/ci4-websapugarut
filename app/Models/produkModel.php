<?php

namespace App\Models;

use CodeIgniter\Model;

class produkModel extends Model
{
	protected $table = 'tb_produkunggulan';
	protected $primaryKey = 'id_produk';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_produk', 'slug_produk', 'isi_produk', 'foto_produk'];

	public function getProduk($slug_produk = false)
	{
		if ($slug_produk == false) {
			return $this->findAll();
		}

		return $this->where(['slug_produk' => $slug_produk])->first();
	}

	public function search($keyword_produk)
	{
		return $this->table('tb_produkunggulan')->like('judul_produk', $keyword_produk)->orLike('isi_produk', $keyword_produk);
	}

	public function listing()
	{
		$builder = $this->db->table('tb_produkunggulan');
		$builder->select('tb_produkunggulan.*');
		$builder->orderBy('tb_produkunggulan.created_at', 'DESC');
		$builder->limit(5);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
