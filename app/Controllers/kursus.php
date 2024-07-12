<?php

namespace App\Controllers;

use App\Models\ComplitModel;
use App\Models\JenisModel;
use App\Models\KursusModel;
use App\Models\MyKursusModel;
use App\Models\PembelajaranModel;

class Kursus extends BaseController {

    protected $jenisModel;
    protected $kursusModel;
    protected $pemebelajaranModel;
    protected $myKursusModel;
    protected $materiKomplitModel;

    public function __construct() {
        $this->jenisModel = new JenisModel();
        $this->kursusModel = new KursusModel();
        $this->pemebelajaranModel = new PembelajaranModel();
        $this->myKursusModel = new MyKursusModel();
        $this->materiKomplitModel = new ComplitModel();
    }

    public function jenis() {
        $data = [
            'title' => 'JENIS KURSUS',
        ];

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        return view('kursus/jenis', $data);
    }

    public function kursus() {
        $data = [
            'title' => 'KURSUS',
            'id_jenis' => ''
        ];

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        return view('kursus/kursus', $data);
    }

    public function detailJenis($id_jenis) {
        $data = [
            'title' => 'KURSUS',
            'id_jenis' => $id_jenis
        ];

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        return view('kursus/kursus', $data);
    }

    public function tambahJenis() {

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }

        $warna = $this->request->getVar('warna');
        $getWarna = substr($warna, 1);

        $this->jenisModel->save([
            'jenis_kursus' => $this->request->getVar('jenis'),
            'warna' => $getWarna,
            'icon' => $this->request->getVar('icon'),
        ]);

        return redirect()->to(base_url('/jenis'));

    }

    public function detailKursus($namaKursus) {

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }

        $dataKursus = $this->kursusModel->findAll();

        $nama = str_replace('_', ' ', $namaKursus);

        foreach ($dataKursus as $get) {
            if ($get['nama_kursus'] == $nama) {
                $id_kursus = $get['id_kursus'];
                $data = [
                    'title' => $nama,
                    'id_kursus' => $id_kursus
                ];

                return view('kursus/detailKursus', $data);
            }
        }
        
    }

    public function tambahKursus() {
        

        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        

        $this->kursusModel->save([
            'id_user' => userLogin()->id_user,
            'id_jenis' => $this->request->getVar('jenis'),
            'nama_kursus' => $this->request->getVar('kursus'),
            'level_kursus' => $this->request->getVar('level'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        
        $this->updateJmlKursus($this->request->getVar('jenis'));

        return redirect()->to(base_url('/kursus/kursus'));
    }

    public function updateJmlKursus($id_jenis) {
        foreach (jenisKursus() as $jenis) {
            if ($jenis['id_jenis'] == $id_jenis) {
                $this->jenisModel->save([
                    'id_jenis' => $id_jenis,
                    'jumlah_kursus' => $jenis['jumlah_kursus'] + 1,
                ]);
            }
        }
    }

    public function tambahModul() {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        
        $this->pemebelajaranModel->save([
            'id_kursus' => $this->request->getVar('id'),
            'nama_pembelajaran' => $this->request->getVar('modul'),
            'modul_keterangan' => $this->request->getVar('keterangan'),
        ]);

        

        return redirect()->to(base_url('/kursus/Kursus'));

    }
    
    public function editKursus($namaKursus) {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }
        
        $dataKursus = $this->kursusModel->findAll();

        $nama = str_replace('_', ' ', $namaKursus);

        foreach ($dataKursus as $get) {
            if ($get['nama_kursus'] == $nama) {
                $id_kursus = $get['id_kursus'];
                $data = [
                    'title' => $nama,
                    'id_kursus' => $id_kursus,
                    'nama' => $namaKursus
                ];

                return view('kursus/editKursus', $data);
            }
        }
        
        return redirect()->to(base_url('/kursus/Kursus'));

    }

    public function updateKursus($namaKursus) {
        if (!session()->get('id_user')) {
            return redirect()->to(base_url('auth'));
        }

        // $dataKursus = $this->kursusModel->findAll();

        $nama = str_replace('_', ' ', $namaKursus);

        foreach (kursusAll() as $get) {
            if ($get['nama_kursus'] == $nama) {
                $id_kursus = $get['id_kursus'];
                $this->updateNamaKursus($get['id_kursus'], $get['id_jenis'], $this->request->getPost('idModul'));
                $data = [
                    'title' => $nama,
                    'id_kursus' => $id_kursus,
                    // 'nama' => $namaKursus
                ];
        
                return view('kursus/detailKursus', $data);
            }
        }

    }

    public function updateNamaKursus($id_kursus, $id_jenis, $id_modul) {
        $this->kursusModel->save([
            'id_kursus' => $id_kursus,
            'id_user' => userLogin()->id_user,
            'id_jenis' => $id_jenis,
            'nama_kursus' => $this->request->getPost('namaKursus'),
            'keterangan' => $this->request->getPost('caption'),
        ]);
    }

    public function daftarKursus ($id_kursus) {
        $kursusTerdaftar = myKursus();

        $alreadyRegistered = false;

        // Loop melalui daftar kursus yang sudah didaftarkan
        foreach ($kursusTerdaftar as $my) {
            // Cek apakah user sudah terdaftar di kursus yang sama
            if ($my['id_kursusMy'] == $id_kursus AND $my['id_userMy'] == userLogin()->id_user) {
                $alreadyRegistered = true;
                break;
            }
        }

        // Jika belum terdaftar di kursus tersebut, simpan data pendaftaran baru
        if (!$alreadyRegistered) {
            $this->myKursusModel->save([
                'id_kursusMy' => $id_kursus,
                'id_userMy' => userLogin()->id_user,
                'status' => 'progres',
            ]);

            // Uncomment if needed
            $this->updateJmlPeserta($id_kursus);


            

            return redirect()->to(base_url('kursus/kursus'));
        } else {
            echo "Anda sudah terdaftar di kursus ini.";
            return redirect()->to(base_url('kursus/kursus'));
        }
    }

    public function daftaran ($id_kursus) {
        $this->myKursusModel->save([
            'id_kursusMy' => $id_kursus,
            'id_userMy' => userLogin()->id_user,
            'status' => 'progres',
        ]);
    }


    public function updateJmlPeserta ($id_kursus) {
        foreach (kursusAll() as $kursus) {
            if ($kursus['id_kursus'] == $id_kursus) {
                $this->kursusModel->save([
                    'id_kursus' => $id_kursus,
                    'id_user' => $kursus['id_user'],
                    'id_jenis' => $kursus['id_jenis'],
                    'jumlah_peserta' => $kursus['jumlah_peserta'] + 1
                ]);
            }
        }
    }
}
