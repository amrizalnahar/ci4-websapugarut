<?php

namespace App\Models;

use CodeIgniter\Model;

class sktmModel extends Model
{
	protected $table = 'tb_sktm';
	protected $primaryKey = 'id_sktm';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_sktm', 'slug_sktm', 'isi_sktm', 'foto_sktm'];

	public function getSktm($slug_sktm = false)
	{
		if ($slug_sktm == false) {
			return $this->findAll();
		}

		return $this->where(['slug_sktm' => $slug_sktm])->first();
	}

	public function search($keyword_sktm)
	{
		return $this->table('tb_sktm')->like('judul_sktm', $keyword_sktm)->orLike('isi_sktm', $keyword_sktm);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_sktm');
		$this->orderBy('id_sktm', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
