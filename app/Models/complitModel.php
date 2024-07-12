<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplitModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'materi_complete';
    protected $primaryKey = 'id_complit';

    protected $allowedFields = ['id_userCom', 'id_materiCom', 'status_com'];
}

?>