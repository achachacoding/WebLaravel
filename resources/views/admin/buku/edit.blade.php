@extends('admin.layout.master')

@section('judul')
Halaman Edit Buku   
@endsection

@section('content')

<form action="/admin/buku/{{$buku->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" name="judul_buku" value="{{$buku->judul_buku}}">
        </div>
        @error('judul_buku')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file" accept=".pdf">
        </div>
        @error('file')

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/buku" class="btn btn-default">Batal</a>
    </div>
</form>
@endsection