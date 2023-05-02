<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            width: 25%;
        }
        table td{
            padding-right: 5px;
        }
    </style>
</head>
<body>
    @php
        $status = $data['status_verifikasi'];

        if($status == '1') {
            $sts = 'Terverfikasi';
        } elseif($status == '2') {
            $sts = 'Ditolak';
        }
    @endphp
    <p>Salam Hormat, </p>

    <p>Pengujian kamu sudah direspon dengan status : <b> {{ $sts }} </b> cek di <a href="https://airportslab.com/login">Smart Material Test</a> </p>
    

    <p>Terima Kasih,</p>

    <p style="font-weight: bold">Admin Smart Material Test App</p>
</body>
</html>

