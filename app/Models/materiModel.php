<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'tb_materi';
    protected $primaryKey = 'id_materi';

    protected $allowedFields = ['id_kursus', 'id_user', 'nama_materi', 'nama_file', 'modul', 'materi_keterangan'];
}

?>