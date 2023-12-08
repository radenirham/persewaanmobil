@extends('layouts.master')
@section('tittle','Edit Data Pegawai')
@section('content')
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">Silahkan input data</h3>
              </div>
                <!-- form start -->
                      <form method="POST" action='{{ url('pegawai/edituser/'. $pegawai->id) }}' enctype="multipart/form-data" >                    
                        @csrf
                        <div class="form-group">
                              <label for="foto">Foto</label><br>
                              <img src="{{ asset('image/' . $pegawai->foto) }}" alt="Product Image" style="height:100px;width:100px;">
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto">
                                  <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                              </div>
                            </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{$pegawai->pegawai_nama}}" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="nomor">Umur</label>
                                <input type="text" class="form-control" id="umur" value="{{$pegawai->pegawai_umur}}" name="umur">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="alamat" value="{{$pegawai->alamat}}" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" value="{{$pegawai->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" value="{{$pegawai->password}}" name="password">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

