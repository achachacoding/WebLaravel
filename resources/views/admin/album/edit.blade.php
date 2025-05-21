@extends('admin.layout.master')

@section('judul')
Halaman Edit nama_album
@endsection

@section('content')

<form action="/admin/album/{{$album->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Nama Album</label>
            <input type="text" class="form-control" name="nama_album" value="{{$album->nama_album}}">
        </div>
        @error('nama_album')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>
       
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/album" class="btn btn-default">Batal</a>
    </div>
</form>
@endsection