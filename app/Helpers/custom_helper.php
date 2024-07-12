<?php

use App\Models\ComplitModel;
use App\Models\JenisModel;
use App\Models\KursusModel;
use App\Models\MateriModel;
use App\Models\MyKursusModel;
use App\Models\PembelajaranModel;
use App\Models\UserModel;

function userLogin () {
    $userModel = new UserModel();
    return $userModel->where('id_user', session('id_user'))->get()->getRow();
}

function dataUser () {
    $userModel = new UserModel();
    return $userModel->findAll();
}

function jenisKursus () {
    $jenisKursus = new JenisModel();
    return $jenisKursus->findAll();
}

function kursusAll () {
    $kursus = new KursusModel();
    return $kursus->join('tb_user', 'tb_kursus.id_user = tb_user.id_user')->join('jenis_kursus', 'tb_kursus.id_jenis = jenis_kursus.id_jenis')->findAll();
}

function kursusUser () {
    $kursus = new KursusModel();
    return $kursus->join('tb_user', 'tb_kursus.id_user = tb_user.id_user')->join('jenis_kursus', 'tb_kursus.id_jenis = jenis_kursus.id_jenis')->get()->getRow();
}

function pembelajaran () {
    $pembelajaran = new PembelajaranModel();
    return $pembelajaran->join('tb_kursus', 'tb_pembelajaran.id_kursus = tb_kursus.id_kursus')->findAll();
}

function materi () {
    $materi = new MateriModel();
    return $materi->join('tb_user', 'tb_materi.id_user = tb_user.id_user')->join('tb_kursus', 'tb_materi.id_kursus = tb_kursus.id_kursus')->findAll();
}

function materiUser () {
    $materi = new MateriModel();
    return $materi->join('tb_user', 'tb_materi.id_user = tb_user.id_user')->join('tb_kursus', 'tb_materi.id_kursus = tb_kursus.id_kursus')->get()->getRow();
}

function myKursus () {
    $myKursus = new MyKursusModel();
    return $myKursus->join('tb_user', 'tb_mykursus.id_userMy = tb_user.id_user')->join('tb_kursus', 'tb_mykursus.id_kursusMy = tb_kursus.id_kursus')->findAll();
}


function myKursusOdd () {
    $myKursus = new MyKursusModel();
    return $myKursus->join('tb_user', 'tb_mykursus.id_userMy = tb_user.id_user')->join('tb_kursus', 'tb_mykursus.id_kursusMy = tb_kursus.id_kursus')->get()->getRow();
}

function materiKomplit () {
    $komplit = new ComplitModel();
    return $komplit->join('tb_user', 'materi_complete.id_userCom = tb_user.id_user')->join('tb_materi', 'materi_complete.id_materiCom = tb_materi.id_materi')->findAll();
}

function materiKomplitTung () {
    $komplit = new ComplitModel();
    return $komplit->join('tb_user', 'materi_complete.id_userCom = tb_user.id_user')->join('tb_materi', 'materi_complete.id_materiCom = tb_materi.id_materi')->get()->getRow();
}


function jmlKursus ($user) {
    $jumlah = 0;
    foreach (kursusAll() as $temp) {
        if($temp['id_user'] ==$user) {
            $jumlah = $jumlah + 1;
        }
    }
    return $jumlah;
}

function jmlMateri ($user) {
    $jumlah = 0;
    foreach (materi() as $temp) {
        if($temp['id_user'] == $user) {
            $jumlah = $jumlah + 1;
        }
    }
    return $jumlah;
}

function jmlPeserta ($user) {
    $jumlah = 0;
    foreach (kursusAll() as $temp) {
        if($temp['id_user'] == $user) {
            $jumlah += $temp['jumlah_peserta'];
        }
    }
    return $jumlah;
}

function jmlModul ($id_get) {
    $jumlah = 0;
    foreach (pembelajaran() as $temp) {
        if($temp['id_kursus'] == $id_get) {
            $jumlah ++;
        }
    }
    return $jumlah;
}

function jmlKomplit ($id_get) {
    $jumlah = 0;
    foreach (materiKomplit() as $temp) {
        if ($temp['id_kursus'] == $id_get AND $temp['status_com'] == 'sudah' AND $temp['id_userCom'] == userLogin()->id_user) {
            $jumlah++;
        }
    }
    return $jumlah;
}


?>