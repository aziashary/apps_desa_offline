@extends('layouts.main')
@section('judul')
<title>Data Kartu Keluarga - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Data Kartu Keluarga</li>
            </ol>
      
            
        <div class="card">
            <h4 class="card-header">Data Kartu Keluarga</h4>
                <div class="card-body mb-3">
                    <div class="btn-group">
                        <a href="{{ url('admindesa/warga/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data Warga</i></a>
                    </div>
                    <br>

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
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                            $no = 1;
                            ?>
                    <tbody>
                        
                    @foreach($data as $kk)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kk->no_kk }}</td>
                            <td>{{ $kk->kepala_keluarga }}</td>
                            <td align="center" >
                                    <button type="button" class="btn btn-secondary detail-kk-btn"
                                        data-no_kk="{{ $kk->no_kk }}" data-bs-toggle="modal" data-bs-target="#detailModal">
                                        Detail KK
                                    </button>
                                    <a href="{{ URL('admindesa/warga/editkk/'. $kk->no_kk) }}" class="btn btn-success">Edit Kepala Keluarga</a>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Keterangan KK </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($item as $warga)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $warga->nik }}</td>
                                    <td>{{ $warga->nama_warga }}</td>
                                    <td>{{ \Carbon::parse($warga->tanggal_lahir)->age }} Tahun</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('js')
<script src="{{ asset ('plugin/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{ asset ('plugin/js/pages/simple-datatables.js')}}"></script>

<script>
    $(document).ready(function () {
    $('.detail-kk-btn').click(function () {
        var no_kk = $(this).data('no_kk');

        $.ajax({
            url: '/get-warga-by-no-kk',
            type: 'GET',
            data: { no_kk: no_kk },
            success: function (response) {
                // Update tabel di dalam modal dengan data yang diterima dari server
                $('#table2 tbody').html(response.html);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

</script>

@endpush


