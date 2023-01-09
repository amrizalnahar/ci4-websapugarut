<?php

namespace App\Models;

use CodeIgniter\Model;

class komoditiModel extends Model
{
	protected $table = 'tb_komoditiunggulan';
	protected $primaryKey = 'id_komoditi';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_komoditi', 'slug_komoditi', 'isi_komoditi', 'foto_komoditi'];

	public function getKomoditi($slug_komoditi = false)
	{
		if ($slug_komoditi == false) {
			return $this->findAll();
		}

		return $this->where(['slug_komoditi' => $slug_komoditi])->first();
	}

	public function search($keyword_komoditi)
	{
		return $this->table('tb_komoditiunggulan')->like('judul_komoditi', $keyword_komoditi)->orLike('isi_komoditi', $keyword_komoditi);
	}

	public function listing()
	{
		$builder = $this->db->table('tb_komoditiunggulan');
		$builder->select('tb_komoditiunggulan.*');
		$builder->orderBy('tb_komoditiunggulan.created_at', 'DESC');
		$builder->limit(5);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
