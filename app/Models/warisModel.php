<?php

namespace App\Models;

use CodeIgniter\Model;

class warisModel extends Model
{
	protected $table = 'tb_waris';
	protected $primaryKey = 'id_waris';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_waris', 'slug_waris', 'isi_waris', 'foto_waris'];

	public function getWaris($slug_waris = false)
	{
		if ($slug_waris == false) {
			return $this->findAll();
		}

		return $this->where(['slug_waris' => $slug_waris])->first();
	}

	public function search($keyword_waris)
	{
		return $this->table('tb_waris')->like('judul_waris', $keyword_waris)->orLike('isi_waris', $keyword_waris);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_waris');
		$this->orderBy('id_waris', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
