<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        if (!session()->get('id_user')) {
            $data = [
                'title' => 'HOME',
                'name' => NULL,
            ];

            return view('main', $data);
        } else {
            $data = [
                'title' => 'HOME',
                'name' => session()->get('nama'),
            ];

            return view('main', $data);
        }
        


    }
}
