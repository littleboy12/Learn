<?php

namespace App\Controllers;

use App\Models\ComplitModel;
use App\Models\MateriModel;

class Materi extends BaseController {

    protected $materiModel;
    protected $materiKomplitModel;

    public function __construct() {
        $this->materiModel = new MateriModel();
        $this->materiKomplitModel = new ComplitModel();
    }

    public function materi() {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }

        $data = [
            'title' => 'Materi',
        ];

        return view('materi/materi', $data);
    }

    public function saveMateri() {
        $data = [
            'title' => 'Materi',
        ];

        if (!$this->validate([
            'videoMateri' => [
                'rules' => 'ext_in[video,mov,mpeg,mp4]',
            ],
            'modul' => [
                'rules' => 'ext_in[fileModul,pdf]',
            ] 
        ])) {
            return redirect()->to('materi/materi')->withInput();
        }

        $fileVideo = $this->request->getFile('video');
        $fileModul = $this->request->getFile('fileModul');

        if ($fileVideo->getError() == 4 AND $fileModul->getError() == 4) {
            $namaVideo = 'default.jpg';
            $namaModul = 'defailt.jpg';
        } else {
            $namaVideo = $fileVideo->getRandomName();
            $namaModul = $fileModul->getRandomName();

        }


        $fileVideo->move('video', $namaVideo);
        $fileModul->move('file', $namaModul);


        $this->materiModel->save([
            'id_user' => userLogin()->id_user,
            'id_kursus' => $this->request->getVar('kursus'),
            'nama_materi' => $this->request->getVar('materi'),
            'nama_file' =>$namaVideo,
            'modul' =>$namaModul,
            'materi_keterangan' => 'Ubah Keterangan....',
        ]);


        return redirect()->to(base_url('materi'));

    }

    public function updateCaption($id_materi){
        foreach(materi() as $view) {
            if ($view['id_materi'] == $id_materi) {
                $id_kursus = $view['id_kursus'];
            }
        }

        $this->materiModel->save([
            'id_materi' => $id_materi,
            'id_kursus' => $id_kursus,
            'id_user' => userLogin()->id_user,
            'materi_keterangan' => $this->request->getVar('caption')
        ]);

        return redirect()->to(base_url('materi'));
    }

    public function updateStatusMateri ($id_materi) {
        $materi = materiKomplit();

        $alreadyRegistered = false;
        foreach ($materi as $k) {
            // Cek apakah user sudah terdaftar di kursus yang sama
            if ($k['id_materiCom'] == $id_materi AND $k['id_userCom'] == userLogin()->id_user) {
                $alreadyRegistered = true;
                break;
            }
        }

        if (!$alreadyRegistered) {
            foreach (materi() as $k) {
                if ($k['id_materi'] == $id_materi) {
                    $this->materiKomplitModel->save([
                        'id_userCom' => userLogin()->id_user,
                        'id_materiCom' => $k['id_materi'],
                        'status' => 'belum',
                    ]);
                }
            }
        }
        
        foreach(materiKomplit() as $view) {
            if ($view['id_materiCom'] == $id_materi) {
                echo $view['id_materiCom'];
                $this->materiKomplitModel->save([
                    'id_complit' => $view['id_complit'],
                    'id_userCom' => $view['id_userCom'],
                    'id_materiCom' => $view['id_materiCom'],
                    'status_com' => 'sudah',
                ]);
            }
        }

        return redirect()->to(base_url('materi'));
    }
}
