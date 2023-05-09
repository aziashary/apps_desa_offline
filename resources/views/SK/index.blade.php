@extends('layouts.main')
@section('judul')
<title>Data SK - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Surat Keterangan Usaha</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Surat Keterangan </h4>
                <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('admindesa/SK/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Surat Keterangan </i></a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Nama</th>
                        <th>Tanggal Dibuat</th>
                        <th>Jenis Surat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $sk)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $sk->no_sk}}</td>
                        <td>{{ $sk->wargas->nama_warga }}</td>
                        <td>{{ date('d-m-Y', strtotime($sk->created_at)) }}</td>
                        <td>{{ $sk->jenis_sk}}</td>
                        <td>{{ $sk->keterangan_1 }}
                        <td align="center" >
                            <a href="{{ URL('admindesa/SK/edit/'. $sk->id_sk) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('admindesa/SK/delete/'. $sk->id_sk) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a>
                        </td>
                        <td align="center" >
                            <a href="{{ URL('admindesa/SK/print/'. $sk->id_sk) }}" target="_blank" class="btn btn-primary">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>

<!-- Modal konfirmasi delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="{{ URL('admindesa/SK/delete/'. $sk->id_sk) }}" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>



<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script>  

@endpush