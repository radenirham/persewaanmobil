@extends('layouts.master')
@section('tittle','Manajemen Mobil')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mobil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Mobil</li>
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
          <h3 class="card-title">Daftar Mobil</h3>
          <form action="{{route('mobil.index')}}" method="get">
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
                <th>Merek Mobil</th>
                <th>Model</th>
                <th>Nomor Plat</th>
                <th>Tarif Sewa Per Hari</th>                                
              </tr>
            </thead>
            <tbody>
            @foreach($mobil as $item)
              <tr>
                  <td>{{ $item->merek }}</td>
                  <td>{{ $item->model }}</td>
                  <td>{{ $item->platnomor }}</td>
                  <td>{{ $item->tarifsewa }}</td>     
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

