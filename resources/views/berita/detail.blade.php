@extends('layout.master')

@section('content')

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Berita</h2>
      </div>
    </div>


    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset('image/'.$berita->foto)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{$berita->judul_berita}}</h3>
            <h4 class="fst-italic">{{$berita->kategori->nama_kategori}}</h4>
            <p>{!! $berita->isi !!}</p>
        

          </div>
        </div>

      </div>
    </section>

@endsection