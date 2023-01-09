<?php

namespace App\Models;

use CodeIgniter\Model;

class hargatanahModel extends Model
{
	protected $table = 'tb_hargatanah';
	protected $primaryKey = 'id_hargatanah';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_hargatanah', 'slug_hargatanah', 'isi_hargatanah', 'foto_hargatanah'];

	public function getHargatanah($slug_hargatanah = false)
	{
		if ($slug_hargatanah == false) {
			return $this->findAll();
		}

		return $this->where(['slug_hargatanah' => $slug_hargatanah])->first();
	}

	public function search($keyword_hargatanah)
	{
		return $this->table('tb_hargatanah')->like('judul_hargatanah', $keyword_hargatanah)->orLike('isi_hargatanah', $keyword_hargatanah);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_hargatanah');
		$this->orderBy('id_hargatanah', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
