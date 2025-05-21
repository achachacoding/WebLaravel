@extends('layout.master')

@section('content')

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Berita</h2>
      </div>
    </div>


@forelse ($berita as $item)

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('image/'.$item->foto)}}" class="img-fluid w-50" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{$item->judul_berita}}</h3>
            <h4 class="fst-italic">{{$item->kategori->nama_kategori}} | {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y')}}</h4>
            <p>{{ Str::limit(strip_tags($item->isi), 50) }}</p>
            <a href="/berita/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Baca Selengkapnya</a>


          </div>
        </div>

      </div>
    </section>

</div>    
    @empty
        <h2>Tidak ada postingan</h2>
    @endforelse

</div>

     <br/>
	Halaman : {{ $berita->currentPage() }} <br/>
	Jumlah Data : {{ $berita->total() }} <br/>
	Data Per Halaman : {{ $berita->perPage() }} <br/>

    <br>

<div class="d-flex justify-content-center mt-4 align-items-center">
    {{ $berita->links('pagination::simple-bootstrap-5') }}
</div>


@endsection