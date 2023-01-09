<?php

namespace App\Models;

use CodeIgniter\Model;

class ktpModel extends Model
{
	protected $table = 'tb_ktp';
	protected $primaryKey = 'id_ktp';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_ktp', 'slug_ktp', 'isi_ktp'];

	public function getKtp($slug_ktp = false)
	{
		if ($slug_ktp == false) {
			return $this->findAll();
		}

		return $this->where(['slug_ktp' => $slug_ktp])->first();
	}

	public function search($keyword_ktp)
	{
		return $this->table('tb_ktp')->like('judul_ktp', $keyword_ktp)->orLike('isi_ktp', $keyword_ktp);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_ktp');
		$this->orderBy('id_ktp', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
