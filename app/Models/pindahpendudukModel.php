<?php

namespace App\Models;

use CodeIgniter\Model;

class pindahpendudukModel extends Model
{
	protected $table = 'tb_pindahpenduduk';
	protected $primaryKey = 'id_pindahpenduduk';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul_pindahpenduduk', 'slug_pindahpenduduk', 'isi_pindahpenduduk', 'foto_pindahpenduduk'];

	public function getPindahpenduduk($slug_pindahpenduduk = false)
	{
		if ($slug_pindahpenduduk == false) {
			return $this->findAll();
		}

		return $this->where(['slug_pindahpenduduk' => $slug_pindahpenduduk])->first();
	}

	public function search($keyword_pindahpenduduk)
	{
		return $this->table('tb_pindahpenduduk')->like('judul_pindahpenduduk', $keyword_pindahpenduduk)->orLike('isi_pindahpenduduk', $keyword_pindahpenduduk);
	}

	public function listing()
	{
		$this->paginate(5, 'tb_pindahpenduduk');
		$this->orderBy('id_pindahpenduduk', 'DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}
