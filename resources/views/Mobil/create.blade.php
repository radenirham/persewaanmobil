@extends('layouts.master')
@section('tittle','Create Data Mbil')
@section('content')
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Data Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">Silahkan input data</h3>
              </div>
                <!-- form start -->
                    <form action="{{route('createmobil')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="merek">Merek Mobil</label>
                                <input type="text" class="form-control" id="merek" placeholder="Input Merek Mobil" name="merek">
                            </div>
                            <div class="form-group">
                                <label for="model">Model Mobil</label>
                                <input type="text" class="form-control" id="model" placeholder="Input Model Mobil" name="model">
                            </div>
                            <div class="form-group">
                                <label for="plat">Plat Nomor</label>
                                <input type="text" class="form-control" id="plat" placeholder="Input Plat Nomor Mobil" name="platnomor">
                            </div>
                            <div class="form-group">
                                <label for="tarifsewa">Tarif Sewa</label>
                                <input type="text" class="form-control" id="tarifsewa" placeholder="Input Plat Nomor Mobil" name="tarifsewa">
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

