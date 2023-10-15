@extends('layouts.main')
@section('judul')
<title>Edit Kartu Keluarga - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admindesa/warga') }}">Data Warga</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Warga</li>
        </ol>

        <div class="card">
              <div class="card-header">
                <h1 class="card-title">Edit Kartu Keluarga</h1>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ url('admindesa/warga/updatekk/'. $data->no_kk) }}" enctype="multipart/form-data">
                @csrf {{ method_field('PATCH') }}
            
                <div class="form-group">
                    <label for="nama_jabatan">Kepala Keluarga</label>
                    <select class="form-control" name='nama_warga'>
                    <option value='{{ $data->kepala_keluarga}}'>{{ $data->kepala_keluarga }}</option>

                    @foreach($item as $keys)
                    
                        <option value='{{$keys->nama_warga}}'>{{$keys->nama_warga}}</option>
                    
                    @endforeach
                    </select>
                </div>
            <br>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/warga/kartu-keluarga') }}">Cancel</a>
          </form>
        </div> 
    </div>
    </section>
    @endsection