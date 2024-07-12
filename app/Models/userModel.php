<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['nama', 'email', 'username', 'password', 'kontak', 'image', 'about', 'level'];
}

?>