@extends('layouts.main')
@section('judul')
<title>Data Warga - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('plugin/extensions/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{ asset ('plugin/css/pages/simple-datatables.css')}}">
@endpush
@section('content')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Warga</h4>
                <div class="card-body">
                    <div class="btn-group">
                        <a href="{{ url('admindesa/warga/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data Warga</i></a>
                    </div>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                            $no = 1;
                            ?>
                    <tbody>
                        
                    @foreach($data as $warga)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $warga->nik }}</td>
                            <td>{{ $warga->nama_warga }}</td>
                            <td>{{ $warga->jenis_kelamin }}</td>
                            <td>{{ $warga->jenis_pekerjaan }}</td>
                            <td align="center" >
                                <a href="{{ URL('warga/edit/'. $warga->id_warga) }}" class="btn btn-success">Edit</a>
                                <a href="{{ URL('warga/delete/'. $warga->id_warga) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
        </div>
    </div>

</section>
</div>
@endsection
@push('js')
<script src="{{ asset ('plugin/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{ asset ('plugin/js/pages/simple-datatables.js')}}"></script>
@endpush