@extends('admin.layout.master')

@section('judul')
Halaman Album
@endsection

@section('content')

<form action="/admin/album" method="POST" enctype="multipart/form-data">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Nama Album</label>
            <input type="text" class="form-control" name="nama_album" placeholder="Isikan Nama ALbum">
        </div>
        @error('nama_album')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/album" class="btn btn-default">Kembali</a>
    </div>
</form>
    
@endsection