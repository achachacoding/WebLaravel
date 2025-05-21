@extends('admin.layout.master')

@section('judul')
Halaman Edit Kategori    
@endsection

@section('content')

<form action="/admin/kategori/{{$kategori->id}}" method="POST">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_kategori}}">
        </div>
        @error('nama_kategori')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/kategori" class="btn btn-default">Batal</a>
    </div>
</form>
@endsection