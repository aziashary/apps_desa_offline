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
            <h4 class="card-header">Data Surat Keterangan Usaha</h4>
                <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('admindesa/SK/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Surat Keterangan Usaha</i></a>
                </div>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Nama</th>
                        <th>Tanggal Dibuat</th>
                        <th>Jenis Usaha</th>
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
                        <td>{{ $sk->jenis_usaha}}</td>
                        <td align="center" >
                            <a href="{{ URL('SK/edit/'. $sk->id_sk) }}" class="btn btn-success">Edit</a>
                            <a href="{{ URL('SK/delete/'. $sk->id_sk) }}" class="btn btn-danger">Hapus</a>
                        </td>
                        <td align="center" >
                            <a href="{{ URL('SK/print/'. $sk->id_sk) }}" target="_blank" class="btn btn-primary">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/SK/delete') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          Apakah anda yakin akan menghapus data ini?  <br>
        </div>
        <input type="hidden" id="id_surat" name="id_sk">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
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