@extends('admin.layout.master')

@section('judul')
    Halaman Tambah Galeri
@endsection

@section('content')

<form action="/admin/galeri" method="POST" enctype="multipart/form-data">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Nama Galeri</label>
            <input type="text" class="form-control" name="nama_galeri" placeholder="Isikan Nama Galeri">
        </div>
        @error('nama_galeri')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Album</label>
            <select name="album_id" class="form-control" id="">
                    <option value="">-- Pilih Album --</option>
                @forelse ($album as $item)
                    <option value="{{$item->id}}"> {{$item->nama_album}} </option>
                @empty
                    <option value="">Tidak Ada Data Album</option>
                @endforelse
            </select>
        </div>
        @error('album_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/galeri" class="btn btn-default">Kembali</a>
    </div>
</form>
    
@endsection