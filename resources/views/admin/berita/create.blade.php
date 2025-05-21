@extends('admin.layout.master')

@section('judul')
Halaman Berita
@endsection

@section('content')

<form action="/admin/berita" method="POST" enctype="multipart/form-data">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" class="form-control" name="judul_berita" placeholder="Isikan Judul Berita">
        </div>
        @error('judul_berita')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi" class="ckeditor"></textarea>
        </div>
        @error('isi')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" id="">
                    <option value="">-- Pilih Kategori --</option>
                @forelse ($kategori as $item)
                    <option value="{{$item->id}}"> {{$item->nama_kategori}} </option>
                @empty
                    <option value="">Tidak Ada Data Kategori</option>
                @endforelse
            </select>
        </div>
        @error('kategori_id')
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
        <a href="/admin/buku" class="btn btn-default">Kembali</a>
    </div>
</form>
    
@endsection