@extends('admin.layout.master')

@section('judul')
Halaman Tambah    
@endsection

@section('content')

<form action="/admin/buku" method="POST" enctype="multipart/form-data">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" name="judul_buku" placeholder="Isikan Judul Buku">
        </div>
        @error('judul_buku')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file" accept=".pdf">
        </div>
        @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/buku" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection