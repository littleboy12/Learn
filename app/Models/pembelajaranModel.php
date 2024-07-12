<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelajaranModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'tb_pembelajaran';
    protected $primaryKey = 'id_pembelajaran';

    protected $allowedFields = ['id_kursus', 'nama_pembelajaran', 'modul_keterangan',];
}

?>