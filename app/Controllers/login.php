<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return $this->login();
    }

    public function login()
    {
        $data = [
            'title' => 'LOGIN',
        ];

        if (session()->get('id_user')) {
            if (userLogin()->level == 'creator') {
                return redirect()->to(base_url('dashboard'));
            } else {
                return redirect()->to(base_url('kursus/kursus'));
            }
        }
        return view('auth/login', $data);
    }

    public function processLogin()
    {
        $_POST = $this->request->getPost();
        $data = $this->userModel->Where(['email' => $_POST['email'], 'password' => $_POST['password']])->first();

        if ($_POST['password'] != '' or $_POST['email']) {
            if ($data) {
                if ($_POST['password'] == $data['password']) {
                    $params = [
                        'id_user' => $data['id_user'],
                        'nama' => $data['nama'],
                        'email' => $data['email'],
                        'password' => $data['password'],
                        'level' => $data['level'],
                    ];
                    if ($data['level'] == "creator") {
                        session()->set($params);
                        return redirect()->to(base_url('dashboard'));
                    } else {
                        session()->set($params);
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    $err =  "password salah";
                    session()->setFlashdata('error', $err);
                    return redirect()->to(base_url('auth'));
                }
            } else {
                $err =  "email salah";
                session()->setFlashdata('wrongEmail', $err);
                return redirect()->to(base_url('auth'));
            }
        } else {
            $err =  "Masukan Email dan Password";
            session()->setFlashdata('error', $err);
            return redirect()->to(base_url('auth'));
        }
    }

    public function processRegister () {
        $_POST = $this->request->getPost();

        $email = true;

        foreach (dataUser() as $user) {
            if ($user['email'] == $_POST['register-email']) {
                $email = false;
                break;
            }
        }

        if ($_POST['register-nama'] != '' AND $_POST['register-password'] != '' AND $_POST['register-email'] != '') {
            if ($email != false) {
                $this->userModel->save([
                    'nama' => $_POST['register-nama'],
                    'email' => $_POST['register-email'],
                    'username' => $_POST['register-nama'],
                    'password' => $_POST['register-password'],
                    'level' => 'user',
                ]);
            } else {
                $err =  "Masukan Email dan Password";
                session()->setFlashdata('sudahTerdaftar', $err);
                return redirect()->to(base_url('auth'));
            }
        } else {
            $err =  "Masukan Email dan Password";
            session()->setFlashdata('nama', $err);
            return redirect()->to(base_url('auth'));
        }
    }

    public function out() {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }
}
