<?php

use App\Mail\PengujianBaru;
use App\Mail\PengujianUpdate;
use Illuminate\Support\Facades\Mail;

function kirimEmail($isian)
{
    $data = ['jenis' => $isian];

    $kirim = Mail::to("verifikator.lab@poltekbangplg.ac.id")->send(new PengujianBaru($data));
    return response()->json($kirim);
}

function kirimEmailUpdate($isian, $email, $status_verifikasi)
{
    $data = ['jenis' => $isian, 'status_verifikasi' => $status_verifikasi ];

    $kirim = Mail::to($email)->send(new PengujianUpdate($data));
    return response()->json($kirim);
}

?>