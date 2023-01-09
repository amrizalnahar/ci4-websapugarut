<?php

namespace App\Models;

use CodeIgniter\Model;

class beritaModel extends Model
{
	protected $table = 'tb_berita';
	protected $primaryKey = 'id_berita';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_berita', 'slug_berita', 'isi_berita', 'foto_berita'];

	public function getBerita($slug_berita = false)
	{
		if ($slug_berita == false) {
			return $this->findAll();
		}

		return $this->where(['slug_berita' => $slug_berita])->first();
	}

	public function search($keyword_berita)
	{
		return $this->table('tb_berita')->like('judul_berita', $keyword_berita)->orLike('isi_berita', $keyword_berita);
	}

	public function listing()
	{
		$builder = $this->db->table('tb_berita');
		$builder->select('tb_berita.*');
		$builder->orderBy('tb_berita.created_at', 'DESC');
		$builder->limit(5);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
