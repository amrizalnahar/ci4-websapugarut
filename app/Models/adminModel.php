<?php 
namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model{
    protected $table = 'users';
	protected $primaryKey = 'id';
	protected $useTimestamps = true;
	protected $allowedFields = ['email', 'username', 'fullname', 'user_image', 'password_hash'];
}
