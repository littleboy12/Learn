<?php

namespace App\Controllers;

use App\Models\KursusModel;

class Sertif extends BaseController
{
    public function sertif($id_kursus)
    {

        
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        
        foreach (kursusAll() as $kursus) {
            if ($kursus['id_kursus'] == $id_kursus) {
                $data = [
                    'title' => 'Sertif',
                    'nama' => $kursus['nama_kursus'],
                    'creator' => $kursus['nama'],
                    'student' => userLogin()->nama,
                ];                
                
                return view('layout/sertif', $data);
            }
        }

    }
}
