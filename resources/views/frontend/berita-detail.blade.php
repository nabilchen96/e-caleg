@extends('frontend.app')
@section('content')
    <div class="container mt-4 mb-5 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="" style="min-height: 500px;">
                    <div class="card-body p-0">
                        <h4 class="mb-2 mt-4">
                            {{ $detail->judul }}
                        </h4>
                        <i class="bi bi-shop"></i>
                        {{ $detail->name }} |
                        <i class="bi bi-calendar"></i>
                        {{ $detail->created_at }} |
                        <span class="badge bg-primary">{{ $detail->kategori }}</span><br><br>

                        <img width="100%" height="350" class="shadow"
                            style="border: none; border-radius: 15px; object-fit: cover;"
                            src="{{ asset('gambar_berita') }}/{{ $detail->gambar }}" alt="">

                        <br /><br />
                        <p>
                            <?php echo nl2br($detail->deskripsi); ?>
                        </p>
                        <h4 class="mt-5">Diskusi</h4>
                        @if (Auth::check())
                            <form id="form">
                                <input type="hidden" name="id_berita" id="id_berita">
                                <textarea name="pesan" id="pesan" class="form-control mb-4" cols="30" rows="5" placeholder="Diskusi"></textarea>
                                <button class="btn btn-primary" id="tombol_kirim">
                                    <i class="bi bi-send"></i> Kirim
                                </button>
                            </form>
                            <br /><br />
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-door-closed"></i> Login untuk mulai ikut berdiskusi
                            </div>
                        @endif
                        <div id="diskusi">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            {{-- daftar berita --}}
            <h4 class="px-4">Berita Lainnya</h4>
            @include('frontend.components.list-berita', ['data' => $berita])

        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData()
        })

        let url = window.location.href

        let newsSplit = url.split('/')
        let newsId = newsSplit[newsSplit.length - 1];

        document.getElementById('id_berita').value = newsId

        function getData() {
            axios.get('/back/diskusi-berita/' + newsId).then(function(res) {
                let data = res.data.data

                // console.log(data);

                let diskusi = ''

                data.forEach(e => {

                    diskusi += `<p style="font-size: 12px; margin-top: 20px; margin-bottom: 5px">
                                        <i class="bi bi-people"></i> ${e.name} |
                                        <i class="mx-1 bi bi-calendar"></i> ${e.created_at}
                                    </p>
                                    ${e.pesan}
                                    `
                });


                document.getElementById('diskusi').innerHTML = diskusi
            })
        }

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: '/back/store-diskusi-berita',
                    data: formData,
                })
                .then(function(res) {
                    //handle success         
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })

                        document.getElementById("form").reset();
                        getData()

                    } else {
                        //error validation
                        // document.getElementById('password_alert').innerHTML = res.data.respon.password ?? ''
                        // document.getElementById('email_alert').innerHTML = res.data.respon.email ?? ''
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                    document.getElementById("tombol_kirim").disabled = false;
                });
        }
    </script>
@endpush
