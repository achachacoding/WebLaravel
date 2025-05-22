@extends('layout.master')

@section('content')

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Galeri</h2>
      </div>
    </div>


@forelse ($album as $item)

<section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('album/'.$item->foto)}}" style="width: 300px;height: 300px;">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <a href="/galery/{{$item->id}}"><h4>{{$item->nama_album}}</h4></a>
                </div>
                </div>
                
              </div>

        @empty
        Tidak Ada Postingan
        @endforelse

            </div>

        </div>

      </div>
    </section>

@endsection