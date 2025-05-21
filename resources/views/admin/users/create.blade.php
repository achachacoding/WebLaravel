@extends('admin.layout.master')

@section('judul')
Halaman Tambah Admin   
@endsection

@section('content')

<form action="/admin/users" method="POST">
@csrf
    <div class="box-body">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Isikan Nama">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Userrname</label>
            <input type="text" class="form-control" name="username" placeholder="Isikan Username">
        </div>
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Isikan Password">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/users" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection