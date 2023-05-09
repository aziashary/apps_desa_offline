<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    function index()
    {
     $data = Warga::orderBy('nama_warga', 'ASC')->get();
     return view('warga.index', compact('data'));
    }

    function create()
    {
     return view('warga.create');
    }

    function edit($id_warga)
    {
     $data = Warga::where('id_warga', $id_warga)->get();
     return view('warga.edit', compact('data'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'nik'=>'required|max:30|unique:warga,nik',
        ]);

     $form_data = array(
      'nik'  => $request->nik,
      'nama_warga'  => $request->nama_warga,
      'tempat_lahir'  => $request->tempat_lahir,
      'tanggal_lahir'  => $request->tanggal_lahir,
      'RT'  => $request->RT,
      'RW'  => $request->RW,
      'desa'  => $request->desa,
      'alamat'  => $request->alamat,
      'jenis_pekerjaan'  => $request->jenis_pekerjaan,
      'jenis_kelamin'  => $request->jenis_kelamin,
      'agama'  => $request->agama,
      'email' => $request->email,
      'password' => Hash::make($request->nik),
     );

     Warga::create($form_data);

        if($form_data){
            return redirect('admindesa/warga')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_warga)
    {

     $form_data = array(
      'nik'  => $request->nik,
      'nama_warga'  => $request->nama_warga,
      'tempat_lahir'  => $request->tempat_lahir,
      'tanggal_lahir'  => $request->tanggal_lahir,
      'RT'  => $request->RT,
      'RW'  => $request->RW,
      'desa'  => $request->desa,
      'alamat'  => $request->alamat,
      'jenis_pekerjaan'  => $request->jenis_pekerjaan,
      'jenis_kelamin'  => $request->jenis_kelamin,
      'agama'  => $request->agama,
      'email' => $request->email,
      'password' => Hash::make('12345678'),
     );

     Warga::where('id_warga', $id_warga)->update($form_data);

        if($form_data){
            return redirect('admindesa/warga')->with('success','Berhasil Tambah Data Warga');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function delete($id_warga)
    { 
     $destroy = Warga::where('id_warga', $id_warga)->delete();

        if($destroy){
        return redirect('admindesa/warga')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }
}
