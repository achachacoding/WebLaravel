@extends('admin.layout.master')

@section('judul')
    Halaman Galeri
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <a href="/admin/galeri/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
    
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Galeri</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Galeri</th>
                    <th>Foto</th>
                    <th>Album</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($galeri as $key => $value)
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$value->nama_galeri}}</td>
                          <td>
                             <img src="{{asset('galeri/'.$value->foto)}}" style="width:300px; height:200px; object-fit:contain;">
                          </td>
                          <td>{{$value->album->nama_album}}</td>
                          <td>
                            <form action="/admin/galeri/{{$value->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="/admin/galeri/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                          </td>
                        </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center">Belum ada data galeri</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

@endsection