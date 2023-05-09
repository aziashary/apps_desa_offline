@extends('layouts.main')
@section('judul')
<title>Edit Kode SK {{ $kodesk->singkatan_sk }} - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/kodesk') }}">Kode SK</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Kode SK {{ $kodesk->singkatan_sk }}</li>
            </ol>
        
            <div class="card">
                <h4 class="card-header">Edit Kode SK {{ $kodesk->singkatan_sk }}</h4>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admindesa/kodesk/update/'. $kodesk->id_kodesk) }}" enctype="multipart/form-data">
                            @csrf {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="card-body">
                                <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Kode Surat</b></label>
                                    <div class="col-md-7">
                                        <input type="number" class="form-control" id="kode_sk" name="kode_sk" value="{{ $kodesk->kode_sk }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Nama Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="jenis_sk" name="jenis_sk" value="{{ $kodesk->jenis_sk }}" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Singkatan Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="singkatan_sk" name="singkatan_sk" value="{{ $kodesk->singkatan_sk }}" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Upload File Excel</b></label>
                                      <div class="col-md-7">
                                        <input type="file" name="file">
                                      </div>
                                </div>

                                {{-- <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Jumlah Keterangan :</b></label>
                                      <div class="col-md-7">
                                        <select
                                        multiple
                                        class="form-select"
                                        id="jumlah_keterangan"
                                        aria-label="Multiple select example"
                                        >
                                        <option value="" selected>Satu Keterangan</option>
                                        <option value="2">Dua Keterangan</option>
                                        <option value="3">Tiga Keterangan</option>
                                        <option value="4">Empat Keterangan</option>
                                        </select>
                                      </div>
                                </div> --}}

                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan</div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 1</b></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="keterangan_1" name="keterangan_1" value="{{ $kodesk->keterangan_1}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 2</b></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="keterangan_2" name="keterangan_2" value="{{ $kodesk->keterangan_2 }}">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 3</b></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="keterangan_3" name="keterangan_3" value="{{ $kodesk->keterangan_3 }}" >
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 4</b></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="keterangan_4" name="keterangan_4" value="{{ $kodesk->keterangan_4 }}" >
                                        </div>
                                    </div>
                                    
                                    
                            </div>
                            <div class="mb-3 row">
                            <i> *Jika ingin menghapus/menghilangkan keterangan, cukup kosongkan dan hapus isi keterangan yang ingin dihapus</i>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                <a href="{{ url('admindesa/kodesk') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
</div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>



<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script>

<script>
    $('#jumlah_keterangan').on('change', function() {
    var keteranganId = $(this).val();
    keteranganId = keteranganId.join(); // mengubah array menjadi string tunggal
    $.ajax({
        url: '../getketerangan',
        type: 'GET',
        data: {keterangan: keteranganId},
        success: function(response) {
            $('#formInputContainer').html(response);
        },
        error: function() {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
});
</script>

@endpush