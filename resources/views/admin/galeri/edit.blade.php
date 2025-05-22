@extends('admin.layout.master')

@section('judul')
    Halaman Edit Galeri
@endsection

@section('content')

    <form action="/admin/galeri/{{$galeri->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Nama Galeri</label>
            <input type="text" class="form-control" name="nama_galeri" value="{{$galeri->nama_galeri}}">
        </div>
        @error('nama_galeri')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>

        <div class="form-group">
            <label>Album</label>
            <select name="album_id" class="form-control" id="">
                    <option value="">-- Pilih Album --</option>
                @forelse ($album as $item)
                @if ($item->id === $galeri->album_id)
                    <option value="{{$item->id}}" selected> {{$item->nama_album}} </option>
                @else
                    <option value="{{$item->id}}"> {{$item->nama_album}} </option>
                @endif
                @empty
                    <option value="">Tidak Ada Data Album</option>
                @endforelse
            </select>
        </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/galeri" class="btn btn-default">Batal</a>
    </div>
</form>

@endsection