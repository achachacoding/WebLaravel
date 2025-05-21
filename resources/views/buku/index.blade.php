@extends('layout.master')

@section('content')

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Buku</h2>
      </div>
    </div> <br>

<section id="about" class="about">
    <div class="container" data-aos="fade-up">

<div class="col-xs-12">
<div class="box">
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">File</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody>
@forelse ($buku as $item => $value)
    <tr>
      <td>{{$item + 1}}</td>
      <td>{{$value->judul_buku}}</td>
      <td>{{$value->file}}</td>
      <td>
        <a href="{{ route('buku.download', $value->id) }}" target="_blank" class="btn btn-primary btn-sm">Download</a>
    </td>
    </tr>
 @empty
    <tr>
        <td>Tidak Ada Data</td>
    </tr>
@endforelse
   
  </tbody>
</table>
	<br/>
	Halaman : {{ $buku->currentPage() }} <br/>
	Jumlah Data : {{ $buku->total() }} <br/>
	Data Per Halaman : {{ $buku->perPage() }} <br/>

    <br>

<div class="d-flex justify-content-center mt-4 align-items-center">
    {{ $buku->links('pagination::simple-bootstrap-5') }}
</div>

</div>
</div>
</div>

</div>
    </section>
    
@endsection