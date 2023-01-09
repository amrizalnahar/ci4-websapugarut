<?php

namespace App\Models;

use CodeIgniter\Model;

class kematianModel extends Model
{
	protected $table = 'tb_kematian';
	protected $primaryKey = 'id_kematian';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_kematian', 'slug_kematian', 'isi_kematian', 'foto_kematian'];

	public function getKematian($slug_kematian = false)
	{
		if ($slug_kematian == false) {
			return $this->findAll();
		}

		return $this->where(['slug_kematian' => $slug_kematian])->first();
	}

	public function search($keyword_kematian)
	{
		return $this->table('tb_kematian')->like('judul_kematian', $keyword_kematian)->orLike('isi_kematian', $keyword_kematian);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_kematian');
		$this->orderBy('id_kematian', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
