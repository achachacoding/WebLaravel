@extends('admin.layout.master')

@section('judul')
Halaman Edit Admin   
@endsection

@section('content')

<form action="/admin/users/{{$users->id}}" method="POST">
@csrf
@method('PUT')
    <div class="box-body">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" value="{{$users->name}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Userrname</label>
            <input type="text" class="form-control" name="username" value="{{$users->username}}">
        </div>
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" value="{{$users->password}}">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/kategori" class="btn btn-default">Batal</a>
    </div>
</form>
@endsection