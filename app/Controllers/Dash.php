<?php

namespace App\Controllers;

class Dash extends BaseController {

    public function index() {
        $data = [
            'title' => 'DASHBOARD',
        ];
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        
        if (userLogin()->level == 'user') {
            return redirect()->to(base_url('kursus/kursus'));
        }

        return view('dashboard/dashboard', $data);
    }
}
