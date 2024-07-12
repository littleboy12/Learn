<?php

namespace App\Models;

use CodeIgniter\Model;

class MyKursusModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'tb_mykursus';
    protected $primaryKey = 'id_mykursus';

    protected $allowedFields = ['id_userMy', 'id_kursusMy', 'status',];

    public function checkIfExists($id_kursusMy, $id_userMy)
    {
        return $this->where('id_kursusMy', $id_kursusMy)
                    ->where('id_userMy', $id_userMy)
                    ->first();
    }
}

?>