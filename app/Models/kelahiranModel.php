<?php

namespace App\Models;

use CodeIgniter\Model;

class kelahiranModel extends Model
{
	protected $table = 'tb_kelahiran';
	protected $primaryKey = 'id_kelahiran';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_kelahiran', 'slug_kelahiran', 'isi_kelahiran', 'foto_kelahiran'];

	public function getKelahiran($slug_kelahiran = false)
	{
		if ($slug_kelahiran == false) {
			return $this->findAll();
		}

		return $this->where(['slug_kelahiran' => $slug_kelahiran])->first();
	}

	public function search($keyword_kelahiran)
	{
		return $this->table('tb_kelahiran')->like('judul_kelahiran', $keyword_kelahiran)->orLike('isi_kelahiran', $keyword_kelahiran);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_kelahiran');
		$this->orderBy('id_kelahiran', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
