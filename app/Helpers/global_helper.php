<?php

use App\Models\metadata;

function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}

function set_about_nama($nama)
{
    //untuk memecah nama depan dan belakang agar warna bisa berubah
    $arr = explode(" ", $nama);
    $kata_akhir = end($arr);
    $kata_akhir2 = "<span class='text-primary'>$kata_akhir</span>";
    array_pop($arr);
    $namaAwal = implode(" ", $arr);
    return $namaAwal . " " . $kata_akhir2;
}

function set_list_awards($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>', $isi);

    return $isi;
}

function set_list_workflow($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span>', $isi);

    return $isi;
}
