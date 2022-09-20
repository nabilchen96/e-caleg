<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        html {
            height: 100%;
        }

        body {
            background: linear-gradient(white, #1c96ee);
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Kalkulator Samapta</h3>
        <h5 class="text-center">Taruna Perhubungan</h5>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mt-2" style="border: none; border-radius: 15px;">
                    <form action="{{ url('kalkulator') }}">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                                    <option {{ request('jenis_kelamin') == '1' ? 'selected' : '' }} value="1">
                                        Laki-laki</option>
                                    <option {{ request('jenis_kelamin') == '0' ? 'selected' : '' }} value="0">
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Jarak Lari (Meter)</label>
                                <input name="jarak_lari" id="jarak_lari" step="0.01" type="number"
                                    placeholder="Jarak Lari" class="form-control form-control"
                                    value="{{ request('jarak_lari') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Jumlah Push Up (Jumlah)</label>
                                <input name="jumlah_push_up" id="jumlah_push_up" step="0.01" type="number"
                                    placeholder="Jumlah Push Up" class="form-control form-control"
                                    value="{{ request('jumlah_push_up') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Jumlah Sit Up (Jumlah)</label>
                                <input name="jumlah_sit_up" id="jumlah_sit_up" step="0.01" type="number"
                                    placeholder="Jumlah Sit Up" class="form-control form-control"
                                    value="{{ request('jumlah_sit_up') }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Shuttle Run (Detik)</label>
                                <input name="jumlah_shuttle_run" id="jumlah_shuttle_run" step="0.01" type="number"
                                    placeholder="Jumlah Shuttle Run" class="form-control form-control"
                                    value="{{ request('jumlah_shuttle_run') }}">
                            </div>
                            <button type="submit" class="btn btn-primary" style="border-radius: 25px;">Submit</button>
                            {{-- <button type="submit" class="btn btn-danger" style="border-radius: 25px;">Kembali</button> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mt-4" style="border: none; border-radius: 15px;">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td><b>(A) Nilai Lari </b></td>
                                <td>{{ @$nilai_lari ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><b>(B) Nilai Push Up </b></td>
                                <td>{{ @$nilai_pushup ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><b>(B) Nilai Sit Up </b></td>
                                <td>{{ @$nilai_situp ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><b>(B) Nilai Shuttle Run </b></td>
                                <td>{{ @$nilai_shuttlerun ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 14px;">
                                    <span> Nilai Samapta = (A + B) / 2 </span>
                                </td>
                            </tr>
                            <tr>
                                <td><b> Nilai Akhir </b></td>
                                <td>
                                    @php
                                        $samaptaA = (@$nilai_lari * 70) / 100;
                                        $samaptaB = (((@$nilai_pushup + @$nilai_situp + @$nilai_shuttlerun) / 3) * 30) / 100;
                                        
                                        echo $samaptaA + $samaptaB;
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td><b>STATUS</b></td>
                                <td width="25%">
                                    @if ($samaptaA + $samaptaB >= 75)
                                        <span class="text-success">LULUS</span>
                                    @else
                                        <span class="text-danger">BERLATIH LAGI</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br><br>
</body>

</html>
