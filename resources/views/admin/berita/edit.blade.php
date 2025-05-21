@extends('admin.layout.master')

@section('judul')
Halaman Edit Berita 
@endsection

@section('content')

<form action="/admin/berita/{{$berita->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" class="form-control" name="judul_berita" value="{{$berita->judul_berita}}">
        </div>
        @error('judul_berita')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi" class="ckeditor">{{$berita->isi}}"</textarea>
        </div>
        @error('isi')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" id="">
                    <option value="">-- Pilih Kategori --</option>
                @forelse ($kategori as $item)
                @if ($item->id === $berita->kategori_id)
                    <option value="{{$item->id}}" selected> {{$item->nama_kategori}} </option>
                @else
                    <option value="{{$item->id}}"> {{$item->nama_kategori}} </option>
                @endif
                @empty
                    <option value="">Tidak Ada Data Kategori</option>
                @endforelse
            </select>
        </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/berita" class="btn btn-default">Batal</a>
    </div>
</form>
@endsection