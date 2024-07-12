<?php

namespace App\Models;

use CodeIgniter\Model;

class KursusModel extends Model {
    // protected $DBGroup = 'learnapp';
    protected $table = 'tb_kursus';
    protected $primaryKey = 'id_kursus';

    protected $allowedFields = ['id_user', 'id_jenis', 'nama_kursus', 'level_kursus', 'keterangan', 'jumlah_peserta'];
}

?>