@extends('layouts.main')
@section('judul')
<title>Edit {{ $item->jenis_sk }} - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Template Surat Keterangan</li>
            </ol>
        
            <div class="card">
                <h4 class="card-header">Edit Template {{ $item->jenis_sk }} </h4>
                <div class="card-body">
                    <form method="POST" action="{{ url('admindesa/kodesk/updatesk/'. $item->id_kodesk) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <input type="hidden" name="kode_sk" value="{{ $item->kode_sk }}">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Nomor SK</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="no_sk">
                                              @foreach($data as $datask)
                                                <option value="{{ $datask->no_sk}}">{{ $datask->no_sk }}</option>
                                                  @endforeach
                                                <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Nama</b></label>
                                        <div class="col-md-2">
                                            <select class="choices form-select" name="nama_warga">
                                                @foreach($data as $datask)
                                                <option value="{{ $datask->nama_warga}}">{{ $datask->nama_warga }}</option>
                                                    @endforeach
                                                <option value="">-Disable-</option>
                                                <?php
                                                for ($i=1; $i<=11; $i++) {
                                                    for ($j=0; $j<50; $j++) {
                                                        $char = chr(64 + $i);
                                                        $value = $char . ($j+1);
                                                        echo "<option value='{$value}'>{$value}</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>NIK</b></label>
                                    <div class="col-md-2">
                                        <select class="choices form-select" name="nik">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->nik}}">{{ $datask->nik }}</option>
                                                @endforeach
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tempat Lahir</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="tempat_lahir">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->tempat_lahir}}">{{ $datask->tempat_lahir }}</option>
                                                @endforeach
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tanggal Lahir</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="tanggal_lahir">
                                        @foreach($data as $datask)
                                        <option value="{{ $datask->tanggal_lahir}}">{{ $datask->tanggal_lahir }}</option>
                                            @endforeach
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jenis Pekerjaan</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="jenis_pekerjaan">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->jenis_pekerjaan}}">{{ $datask->jenis_pekerjaan }}</option>
                                                @endforeach
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Agama</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="agama">
                                        @foreach($data as $datask)
                                        <option value="{{ $datask->agama}}">{{ $datask->agama }}</option>
                                            @endforeach
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Alamat</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="alamat">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->alamat}}">{{ $datask->alamat }}</option>
                                                @endforeach
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jabatan</b></label>
                                        <div class="col-md-2">
                                        <select class="choices form-select" name="jabatan">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->jabatan}}">{{ $datask->jabatan}}</option>
                                                @endforeach
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Ttd Kepala Desa</b></label>
                                        <div class="col-md-2">
                                        <select class="choices form-select" name="ttd_kepala">
                                            @foreach($data as $datask)
                                            <option value="{{ $datask->ttd_kepala}}">{{ $datask->ttd_kepala}}</option>
                                                @endforeach
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tanggal Surat</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="tanggal">
                                        @foreach($data as $datask)
                                        <option value="{{ $datask->tanggal}}">{{ $datask->tanggal }}</option>
                                            @endforeach
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Ttd Warga</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="ttd_pengaju">
                                        @foreach($data as $datask)
                                        <option value="{{ $datask->ttd_pengaju}}">{{ $datask->ttd_pengaju }}</option>
                                            @endforeach
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan SK</div>
                                    </div>
                                </div>

                                    <div class="mb-4 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>{{ $item->keterangan_1 }}</b></label>
                                        <div class="col-md-7">
                                            <select class="choices form-select" name="keterangan_1">
                                                @foreach($data as $datask)
                                                <option value="{{ $datask->keterangan_1}}">{{ $datask->keterangan_1 }}</option>
                                                    @endforeach
                                                 <option value="">-Disable-</option>
                                                <?php
                                                for ($i=1; $i<=11; $i++) {
                                                    for ($j=0; $j<50; $j++) {
                                                        $char = chr(64 + $i);
                                                        $value = $char . ($j+1);
                                                        echo "<option value='{$value}'>{$value}</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                      @foreach($data as $datask)
                                    @if($datask->keterangan_2 !== null)
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>{{ $item->keterangan_2 }}</b></label>
                                        <div class="col-md-7">
                                          <select class="choices form-select" name="keterangan_2">
                                            <option value="{{ $datask->keterangan_2}}">{{ $datask->keterangan_2 }}</option>
                                            <option value="">-Disable-</option>
                                            @for ($i = 1; $i <= 11; $i++)
                                            @for ($j = 0; $j < 50; $j++)
                                                <?php
                                                $char = chr(64 + $i);
                                                $value = $char . ($j + 1);
                                                ?>
                                                <option value="{{ $value }}">{{ $value }}</option>
                                                @endfor
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                                    <div class="mb-4 row">
                                      @foreach($data as $datask)
                                    @if($datask->keterangan_3 !== null)
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>{{ $item->keterangan_3 }}</b></label>
                                        <div class="col-md-7">
                                          <select class="choices form-select" name="keterangan_2">
                                            <option value="{{ $datask->keterangan_3}}">{{ $datask->keterangan_3 }}</option>
                                            <option value="">-Disable-</option>
                                            @for ($i = 1; $i <= 11; $i++)
                                            @for ($j = 0; $j < 50; $j++)
                                                <?php
                                                $char = chr(64 + $i);
                                                $value = $char . ($j + 1);
                                                ?>
                                                <option value="{{ $value }}">{{ $value }}</option>
                                                @endfor
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                                    <div class="mb-2 row">
                                      @foreach($data as $datask)
                                    @if($datask->keterangan_4 !== null)
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>{{ $item->keterangan_4}}</b></label>
                                        <div class="col-md-7">
                                          <select class="choices form-select" name="keterangan_2">
                                            <option value="{{ $datask->keterangan_4}}">{{ $datask->keterangan_4 }}</option>
                                            <option value="">-Disable-</option>
                                            @for ($i = 1; $i <= 11; $i++)
                                            @for ($j = 0; $j < 50; $j++)
                                                <?php
                                                $char = chr(64 + $i);
                                                $value = $char . ($j + 1);
                                                ?>
                                                <option value="{{ $value }}">{{ $value }}</option>
                                                @endfor
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <p>*Untuk Menambahkan keterangan isi surat, bisa di-update di "Kode SK/Edit Detail SK" </p>
                <p>**Jika ingin menghapus data dalam print page, silahkan select -disabled- </p> 
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
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

@endpush