<?php

namespace App\Models;

use CodeIgniter\Model;

class jaminanpersalinanModel extends Model
{
	protected $table = 'tb_jaminanpersalinan';
	protected $primaryKey = 'id_jaminanpersalinan';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_jaminanpersalinan', 'slug_jaminanpersalinan', 'isi_jaminanpersalinan', 'foto_jaminanpersalinan'];

	public function getJaminanpersalinan($slug_jaminanpersalinan = false)
	{
		if ($slug_jaminanpersalinan == false) {
			return $this->findAll();
		}

		return $this->where(['slug_jaminanpersalinan' => $slug_jaminanpersalinan])->first();
	}

	public function search($keyword_jaminanpersalinan)
	{
		return $this->table('tb_jaminanpersalinan')->like('judul_jaminanpersalinan', $keyword_jaminanpersalinan)->orLike('isi_jaminanpersalinan', $keyword_jaminanpersalinan);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_jaminanpersalinan');
		$this->orderBy('id_jaminanpersalinan', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
