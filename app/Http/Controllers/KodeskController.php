<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kodesk;
use App\Models\Keterangansk;
use Illuminate\Support\Facades\Storage;

class KodeskController extends Controller
{
    function index()
    { 
     $data = Kodesk::with('kets')->orderBy('jenis_sk', 'ASC')->get();
     return view('kodesk.index', compact('data'));
    }

    public function editsk($kodesk)
    {
        // mengambil data surat dengan id yang dipilih
        $data = Keterangansk::where('kode_sk', $kodesk)->get();
        $item = Kodesk::where('kode_sk', $kodesk)->first();

        // mengirim data surat ke view edit.blade.php
        return view('kodesk.editsk', compact('data','item'));
    }
    
    public function create()
    {
        $item = Kodesk::get();
        return view('kodesk.create', compact('item'));
    }

    public function edit($id_kodesk)
    {
        $kodesk = Kodesk::where('id_kodesk', $id_kodesk)->first();
        return view('kodesk.edit', compact('kodesk'));
    }

    public function getketerangan(Request $request)
    {
    $keteranganId = $request->input('keterangan'); // Mengambil nilai jenis_sk_id dari permintaan Ajax

    // Menghasilkan form input otomatis berdasarkan nilai jenis_sk_id
    $formInput = '';

    // Surat
                    if ($keteranganId == 2) {
                        $formInput .= '
                        
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 2</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_2" name="keterangan_2" placeholder="Keterangan 2" required>
                            </div>
                        </div>';
                    } elseif ($keteranganId == 3) {
                        $formInput .= '
                        
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 2</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_2" name="keterangan_2" placeholder="Keterangan 2" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 3</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_3" name="keterangan_3" placeholder="Keterangan 3" required>
                            </div>
                        </div>';
                    } elseif ($keteranganId == 4) {
                        $formInput .= '
                        
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 2</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_2" name="keterangan_2" placeholder="Keterangan 2" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 3</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_3" name="keterangan_3" placeholder="Keterangan 3" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 4</b></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="keterangan_4" name="keterangan_4" placeholder="Keterangan 4" required>
                            </div>
                        </div>';
                    }
    

    return $formInput; // Mengirimkan form input otomatis sebagai respons
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'kode_sk'=>'required|max:30|unique:kodesk,kode_sk',
            'file' => 'nullable|mimes:xlsx,xls|max:2048',
        ]);

        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $request->file->move(public_path('plugin/xls'),$namafile);
        $url = "plugin/xls/". $namafile;

     $form_data = array(
      'kode_sk'  => $request->kode_sk,
      'jenis_sk'  => $request->jenis_sk,
      'singkatan_sk'  => $request->singkatan_sk,
      'file_name' =>  $namafile,
      'url_print' => $url,
        'keterangan_1'  => $request->keterangan_1,
        'keterangan_2'  => $request->keterangan_2,
        'keterangan_3'  => $request->keterangan_3,
        'keterangan_4'  => $request->keterangan_4,
     );
    
     $kode=Kodesk::create($form_data);

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update($id_kodesk, request $request)
    {
       $kodesk=Kodesk::where('id_kodesk', $id_kodesk)->first();
        $form = array(
            'kode_sk' => $request->kode_sk,
        );
        Keterangansk::where('kode_sk', $kodesk->kode_sk)->update($form);

        if ($request->hasFile('file')) {
            // Hapus file yang sudah ada sebelumnya
            Storage::delete('public/plugin/xls/' . $kodesk->file_name);

            // Upload File Baru
            $file = $request->file('file');
            $namafile = $file->getClientOriginalName();
            $request->file->move(public_path('plugin/xls'),$namafile);
            $url = 'plugin/xls/'. $namafile;
        }

        $form_data = array(
            'kode_sk'  => $request->kode_sk,
            'jenis_sk'  => $request->jenis_sk,
            'singkatan_sk'  => $request->singkatan_sk,
            'file_name' =>  $namafile,
            'url_print' => $url,
              'keterangan_1'  => $request->keterangan_1,
              'keterangan_2'  => $request->keterangan_2,
              'keterangan_3'  => $request->keterangan_3,
              'keterangan_4'  => $request->keterangan_4,
              
           );

        $kode=Kodesk::where('id_kodesk', $id_kodesk)->update($form_data);

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function updatesk($kodesk, request $request)
    {

        $form_data = array(
        'kode_sk' => $kodesk,
        'no_sk' => $request->no_sk,
        'nik'=> $request->nik,
        'nama_warga'=> $request->nama_warga,
        'tempat_lahir'=> $request->tempat_lahir,
        'tanggal_lahir'=> $request->tanggal_lahir,
        'alamat'=> $request->alamat,
        'jenis_pekerjaan'=> $request->jenis_pekerjaan,
        'agama'=> $request->agama,
        'keterangan_1'=> $request->keterangan_1,
        'keterangan_2'=> $request->keterangan_2,
        'keterangan_3'=> $request->keterangan_3,
        'keterangan_4'=> $request->keterangan_4,
        'tanggal'=> $request->tanggal,
        'jabatan'=> $request->jabatan,
        'ttd_pengaju'=> $request->ttd_pengaju,
        'ttd_kepala'=> $request->ttd_kepala
              
           );
        
        $cekkode=Keterangansk::where('kode_sk', $kodesk)->get();

        if ($cekkode->isEmpty()) {
            $kode=Keterangansk::create($form_data);
        }else{
            $kode=Keterangansk::where('kode_sk', $kodesk)->update($form_data);
        }

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }


}
