<?php

namespace App\Models;

use CodeIgniter\Model;

class informasiModel extends Model
{
	protected $table = 'tb_informasi';
	protected $primaryKey = 'id_informasi';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_informasi', 'slug_informasi', 'isi_informasi', 'foto_informasi'];

	public function getInformasi($slug_informasi = false)
	{
		if ($slug_informasi == false) {
			return $this->findAll();
		}

		return $this->where(['slug_informasi' => $slug_informasi])->first();
	}

	public function search($keyword_informasi)
	{
		return $this->table('tb_informasi')->like('judul_informasi', $keyword_informasi)->orLike('isi_informasi', $keyword_informasi);
	}

	public function listing()
	{
		$builder = $this->db->table('tb_informasi');
		$builder->select('tb_informasi.*');
		$builder->orderBy('tb_informasi.created_at', 'DESC');
		$builder->limit(5);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
