@extends('admin.layout.master')

@section('judul')
Halaman Tambah Kategori    
@endsection

@section('content')

<form action="/admin/kategori" method="POST">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" placeholder="Isikan Nama Kategori">
        </div>
        @error('nama_kategori')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/kategori" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection