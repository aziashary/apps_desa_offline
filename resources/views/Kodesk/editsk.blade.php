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
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Data Warga 1</div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Nama</b></label>
                                        <div class="col-md-2">
                                            <select class="choices form-select" name="nama_warga">
                                                @if (!is_null($detailkodesk['nama_warga'])) 
                                                <option value="{{$detailkodesk['nama_warga']}}">{{$detailkodesk['nama_warga']}}</option>
                                                @endif    
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
                               
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>NIK</b></label>
                                    <div class="col-md-2">
                                        <select class="choices form-select" name="nik">
                                            @if (!is_null($detailkodesk['nik'])) 
                                            <option value="{{$detailkodesk['nik']}}">{{$detailkodesk['nik']}}</option>
                                            @endif
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
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tempat Lahir</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="tempat_lahir">
                                            
                                            <option value="{{$detailkodesk['tempat_lahir']}}">{{$detailkodesk['tempat_lahir']}}</option>
                                                
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
                                
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tanggal Lahir</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="tanggal_lahir">
                                        
                                        <option value="{{$detailkodesk['tanggal_lahir']}}">{{$detailkodesk['tanggal_lahir']}}</option>
                                            
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
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jenis Pekerjaan</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="jenis_pekerjaan">
                                            
                                            <option value="{{$detailkodesk['jenis_pekerjaan']}}">{{$detailkodesk['jenis_pekerjaan']}}</option>
                                                
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
                                
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Agama</b></label>
                                    <div class="col-md-2">
                                      <select class="choices form-select" name="agama">
                                        
                                        <option value="{{$detailkodesk['agama']}}">{{$detailkodesk['agama']}}</option>
                                            
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
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jenis Kelamin</b></label>
                                    <div class="col-md-2">
                                        <select class="choices form-select" name="jenis_kelamin">
                                            @if (!is_null($detailkodesk['jenis_kelamin'])) 
                                          <option value="{{$detailkodesk['jenis_kelamin']}}">{{$detailkodesk['jenis_kelamin']}}</option>
                                            @endif
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
                                            
                                            <option value="{{$detailkodesk['alamat']}}">{{$detailkodesk['alamat']}}</option>
                                                
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
                        @if ($item->jumlah_warga == 2)
                            <div class="mb-3 row">
                                <div class="divider divider-dark">
                                    <div class="divider-text">Data Warga 2</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Nama</b></label>
                                    <div class="col-md-2">
                                        <select class="choices form-select" name="nama_warga">
                                            
                                            <option value="{{$detailkodesk['nama_warga']}}">{{$detailkodesk['nama_warga']}}</option>
                                                
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
                           
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>NIK</b></label>
                                <div class="col-md-2">
                                    <select class="choices form-select" name="nik">
                                        
                                        <option value="{{$detailkodesk['nik']}}">{{$detailkodesk['nik']}}</option>
                                            
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
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tempat Lahir</b></label>
                                  <div class="col-md-2">
                                      <select class="choices form-select" name="tempat_lahir">
                                        
                                        <option value="{{$detailkodesk['tempat_lahir']}}">{{$detailkodesk['tempat_lahir']}}</option>
                                            
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
                            
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tanggal Lahir</b></label>
                                <div class="col-md-2">
                                  <select class="choices form-select" name="tanggal_lahir">
                                    
                                    <option value="{{$detailkodesk['tanggal_lahir']}}">{{$detailkodesk['tanggal_lahir']}}</option>
                                        
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
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jenis Pekerjaan</b></label>
                                  <div class="col-md-2">
                                      <select class="choices form-select" name="jenis_pekerjaan">
                                        
                                        <option value="{{$detailkodesk['jenis_pekerjaan']}}">{{$detailkodesk['jenis_pekerjaan']}}</option>
                                            
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
                            
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Agama</b></label>
                                <div class="col-md-2">
                                  <select class="choices form-select" name="agama">
                                    
                                    <option value="{{$detailkodesk['agama']}}">{{$detailkodesk['agama']}}</option>
                                        
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
                                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Jenis Kelamin</b></label>
                                <div class="col-md-2">
                                    <select class="choices form-select" name="jenis_kelamin">
                                      
                                      <option value="{{$detailkodesk['jenis_kelamin']}}">{{$detailkodesk['jenis_kelamin']}}</option>
                                          
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
                                        
                                        <option value="{{$detailkodesk['alamat']}}">{{$detailkodesk['alamat']}}</option>
                                            
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
                        @endif
                            <div class="mb-3 row">
                                <div class="divider divider-dark">
                                    <div class="divider-text">Detail Surat</div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <input type="hidden" name="kode_sk" value="{{ $item->kode_sk }}">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Nomor SK</b></label>
                                      <div class="col-md-2">
                                          <select class="choices form-select" name="no_sk">
                                              
                                                <option value="{{$detailkodesk['no_sk']}}">{{$detailkodesk['no_sk']}}</option>
                                                  
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
                                            
                                            <option value="{{$detailkodesk['jabatan']}}">{{$detailkodesk['jabatan']}}</option>
                                                
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
                                            
                                            <option value="{{$detailkodesk['ttd_kepala']}}">{{$detailkodesk['ttd_kepala']}}</option>
                                                
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
                                        
                                        <option value="{{$detailkodesk['tanggal']}}">{{$detailkodesk['tanggal']}}</option>
                                            
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
                                        
                                        <option value="{{$detailkodesk['ttd_pengaju']}}">{{$detailkodesk['ttd_pengaju']}}</option>
                                            
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
                                @foreach ($keterangankodesk as $key => $value)
                                <div class="mb-4 row">
                                    <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>{{ $key }}</b></label>
                                    <div class="col-md-7">
                                        <select class="choices form-select" name="keterangan_1">
                                            <option value="{{ $value }}">{{ $value }}</option>
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i = 1; $i <= 11; $i++) {
                                                for ($j = 0; $j < 50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $hasil = $char . ($j + 1);
                                                    echo "<option value='{$hasil}'>{$hasil}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
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