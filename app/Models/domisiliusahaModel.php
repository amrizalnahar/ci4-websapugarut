<?php

namespace App\Models;

use CodeIgniter\Model;

class domisiliusahaModel extends Model
{
	protected $table = 'tb_domisiliusaha';
	protected $primaryKey = 'id_domisiliusaha';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_domisiliusaha', 'slug_domisiliusaha', 'isi_domisiliusaha', 'foto_domisiliusaha'];

	public function getDomisiliusaha($slug_domisiliusaha = false)
	{
		if ($slug_domisiliusaha == false) {
			return $this->findAll();
		}

		return $this->where(['slug_domisiliusaha' => $slug_domisiliusaha])->first();
	}

	public function search($keyword_domisiliusaha)
	{
		return $this->table('tb_domisiliusaha')->like('judul_domisiliusaha', $keyword_domisiliusaha)->orLike('isi_domisiliusaha', $keyword_domisiliusaha);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_domisiliusaha');
		$this->orderBy('id_domisiliusaha', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
