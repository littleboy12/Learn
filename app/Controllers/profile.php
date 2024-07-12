<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController {

    protected $dataUser;

    function __construct () {
        $this->dataUser = new UserModel();
    }

    public function profile() {
        $data = [
            'title' => 'Profile',
        ];
         return view('user/profile', $data);
    }

    public function addGambar () {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
    }

    public function daftarCreator () {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        
        $post = $this->request->getVar();

        if ($post['noHp'] !== '') {
            $this->dataUser->save([
                'id_user' => userLogin()->id_user,
                'kontak' => $post['noHp'],
                'about' => $post['about'],
                'level' => 'creator',
            ]);

            $err =  "Berhasil Menjadi Creator";
            session()->setFlashdata('success', $err);
            return redirect()->to(base_url('profile'));

        } else {
            $err =  "No Hp Wajib Di Isi";
            session()->setFlashdata('error', $err);
            return redirect()->to(base_url('profile'));
        }
    }
}
