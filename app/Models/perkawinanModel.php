<?php

namespace App\Models;

use CodeIgniter\Model;

class perkawinanModel extends Model
{
	protected $table = 'tb_perkawinan';
	protected $primaryKey = 'id_perkawinan';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_perkawinan', 'slug_perkawinan', 'isi_perkawinan', 'foto_perkawinan'];

	public function getPerkawinan($slug_perkawinan = false)
	{
		if ($slug_perkawinan == false) {
			return $this->findAll();
		}

		return $this->where(['slug_perkawinan' => $slug_perkawinan])->first();
	}

	public function search($keyword_perkawinan)
	{
		return $this->table('tb_perkawinan')->like('judul_perkawinan', $keyword_perkawinan)->orLike('isi_perkawinan', $keyword_perkawinan);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_perkawinan');
		$this->orderBy('id_perkawinan', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
