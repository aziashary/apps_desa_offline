@extends('layouts.main')
@section('judul')
<title>Kontak - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Data Kontak
                </h3>
              </div>
             
              <!-- /.card-header -->
      <div class="card-body ">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              @foreach($data as $kontak)
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="table1">
                  <tbody>
                    <tr>
                      <td>Alamat :</td>
                      <td>{{$kontak->alamat}}</td>
                    </tr>
                    <tr>
                      <td>Email :</td>
                      <td>{{$kontak->email}}</td>
                    </tr>
                    <tr>
                      <td>Nomor Telepon :</td>
                      <td>{{$kontak->no_telepon}}</td>
                    </tr>
                    <tr>
                      <td>Instagram :</td>
                      <td>{{$kontak->instagram}}</td>
                    </tr>
                    <tr>
                      <td>facebook :</td>
                      <td>{{$kontak->facebook}}</td>
                    </tr>
                    <tr>
                      <td>Whatsapp :</td>
                      <td>{{$kontak->whatsapp}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('kontak/edit/'. $kontak->id_kontak) }}"><i class="fas fa-edit"></i>Edit</a>
              </a>
            <!-- /.card -->
            @endforeach
            <!-- /.card -->
          </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
        </div> 
      </div>
</div>
    </section>
    <!-- /.content -->
    @endsection