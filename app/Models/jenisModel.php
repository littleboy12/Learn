<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'jenis_kursus';
    protected $primaryKey = 'id_jenis';

    protected $allowedFields = ['jenis_kursus', 'jumlah_kursus', 'warna', 'icon'];
}

?>