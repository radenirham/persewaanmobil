@extends('layouts.master')
@section('tittle','Aplikasi Ujian')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Pegawai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

        <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pegawai</h3>
          <form action="{{route('pegawai.index')}}" method="get">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
          </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>alamat</th>                                
                <th>Opsi</th>                                
              </tr>
            </thead>
            <tbody>
            @foreach($pegawai as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><img src="{{ asset('image/' . $item->foto) }}" alt="Product Image" style="height:200px;width:200px;"></td>
                  <td>{{ $item->pegawai_nama }}</td>
                  <td>{{ $item->pegawai_umur }}</td>   
                  <td>{{ $item->pegawai_alamat }}</td>
                  <td>
                  <a href="edit/{{$item->id}}" method="get">
                    <i class="nav-icon fas fa-edit"></i>
                  </a>
                  <a href="delete/{{$item->id}}" method="post" onclick="return confirm('Yakin ingin menghapus data?')">
                    <i class="nav-icon fas fa-trash"></i>
                  </a>
                  </td>
              </tr>      
            @endforeach                 
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection

