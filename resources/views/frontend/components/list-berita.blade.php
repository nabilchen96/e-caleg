<div class="col-lg-12 px-4">
    <div class="row">
        @forelse ($data as $item)
            <div class="col-lg-3 p-lg-2 p-1 col-6 mt-3">
                <a href="{{ url('berita-detail') }}/{{ $item->id }}" style="text-decoration: none;"
                    class="card shadow">
                    <img class="foto_berita" src="{{ asset('gambar_berita') }}/{{ $item->gambar }}" />
                    <div class="card-body">
                        <div class="card-text" style="font-size: 14px">
                            <b class="judul_berita">{{ $item->judul }}</b>
                            <p class="mt-2 deskripsi_singkat">{{ $item->deskripsi }}</p>
                            <i class="bi bi-shop"></i>
                            <span style="margin-top: 10px">{{ $item->name }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-lg-12 text-center mt-5">
                <img src="{{ asset('search.svg') }}" width="300px" height="300px" alt="">
                <h4 class="mt-2">Oop!, data yang anda cari tidak ditemukan</h4>
                <h6>Coba cari dengan kata kunci yang mendekati</h6>
            </div>
        @endforelse
    </div>
</div>
