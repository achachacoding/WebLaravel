@extends('admin.layout.master')

@section('judul')
    Halaman Album
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

<a href="/admin/album/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
    
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Album</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama ALbum</th>
                    <th>Cover</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($album as $key => $value)
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$value->nama_album}}</td>
                          <td>
                             <img src="{{asset('album/'.$value->foto)}}" style="width:300px; height:200px; object-fit:contain;">
                          </td>
                          <td>
                            <form action="/admin/album/{{$value->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="/admin/album/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                          </td>
                        </tr>
                    @empty
                        <tr>
                           <td>Tidak ada data</td>
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