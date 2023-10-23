<?php

namespace App\Http\Controllers;

use App\Models\Kodesk;
use Illuminate\Http\Request;
use App\Models\SKKM;
use App\Models\Warga;
use App\Models\Pengajuan;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardwargaController extends Controller
{
    public function index()
    {
     $warga = Warga::count();
     $skkm = SKKM::count();
     $chart = LarapexChart::setType('donut')
                ->setDataset([
                    SKKM::count()
                ])
                ->setColors(['#435ebe','#55c6e8'])
                ->setLabels(['SKKM', 'SKU']);
    
     $char = LarapexChart::setType('bar')
                ->setDataset([
                    SKKM::whereMonth('created_at','01')->count(),
                    SKKM::whereMonth('created_at','02')->count()
                ])
                ->setColors(['#435ebe','#55c6e8'])
                ->setLabels(['Jan', 'Feb']);

     return view('dashboardwarga', [
        'warga' => $warga, 
        'skkm' => $skkm,
        'chart' => $chart,
        'char' => $char
     ]);
    }

    public function profile()
    {
        $username = auth()->user()->username;
        $data = Warga::where('nik', $username)->get();
            return view('lamanwarga.profile', compact('data'));
    }

    public function pengajuan()
    {
        $username = auth()->user()->username;
        $no_kk= Warga::where('nik', $username)->pluck('no_kk')->first();

        $data = Pengajuan::join('warga', 'pengajuan.id_warga', '=', 'warga.id_warga')
                ->where('warga.no_kk', '=', $no_kk)
                ->orderBy('no_pengajuan', 'ASC')
                ->with('wargas')
                ->get();

        return view('lamanwarga.index', compact('data'));
    }

    function create()
    { 
        $username = auth()->user()->username;
        $no_kk = Warga::where('nik', $username)->pluck('no_kk')->first();

        $data= Warga::where('no_kk', $no_kk)->orderBy('nama_warga', 'ASC')->get();
        $item= Kodesk::orderBy('jenis_sk', 'ASC')->get();
        return view('lamanwarga.create', compact('data','item'));
    }

    public function getFormInput(Request $request)
{
    $jenisSkId = $request->input('jenis_sk_id'); // Mengambil nilai jenis_sk_id dari permintaan Ajax

    // Menghasilkan form input otomatis berdasarkan nilai jenis_sk_id
    $kodesk = Kodesk::where('kode_sk', $jenisSkId)->first();

    $keteranganKodesk = json_decode($kodesk->keterangan_kodesk, true);

    $formInput = '';

    // Surat
        foreach ($keteranganKodesk as $key => $value) {
    $formInput .= "<h6>$value</h6>
        <small class='text-muted'><i>Maks. 100 Karakter</i></small>
        <div class='form-group'>
            <input type='text' class='form-control' id='$key' name='$key' value='' maxlength='100' required>
        </div>
        <br>";
    }
    

    return $formInput; // Mengirimkan form input otomatis sebagai respons
}

    function edit($id_pengajuan)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
        return view('lamanwarga.edit', [
        'data' => $data,
        'item' => $item,
        ]);
    }

    function store(Request $request)
    {
        $MonthNow = date('M');
        $month_number = date("n",strtotime($MonthNow));

        $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($month_number > 0) {
        foreach ($map as $roman => $int) {
            if($month_number >= $int) {
                $month_number -= $int;
                $returnValue .= $roman;
                break;
                }
            }
        }
        

        $yearNow = date('Y');
        $id_pengajuan = Pengajuan::latest('id_pengajuan')->select('id_pengajuan')->value('id_pengajuan');
        $no_pengajuan = "PNG"." /"."  ".($id_pengajuan+1)."  "."/ ".$returnValue." / ".$yearNow;
        $jenis_sk = Kodesk::where('kode_sk', $request->kode_sk)->pluck('jenis_sk')->first();

        $username = auth()->user()->username;
        $id_warga= Warga::where('nik', $username)->pluck('id_warga')->first();

     $form_data = array(
      'no_pengajuan'  => $no_pengajuan,
      'kode_sk' => $request->kode_sk,
      'id_warga'  => $id_warga,
      'jenis_pengajuan' => $jenis_sk,
      'status_pengajuan' => 'Process',
      'keterangan_1'  => $request->keterangan_1,
      'keterangan_2'  => $request->keterangan_2,
      'keterangan_3'  => $request->keterangan_3,
      'keterangan_4'  => $request->keterangan_4,
      
     );

     Pengajuan::create($form_data);

        if($form_data){
            return redirect('/dashboardwarga/pengajuan')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_pengajuan)
    {
        // $MonthNow = date('M');
        // $month_number = date("n",strtotime($MonthNow));

        // $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        // $returnValue = '';
        // while ($month_number > 0) {
        // foreach ($map as $roman => $int) {
        //     if($month_number >= $int) {
        //         $month_number -= $int;
        //         $returnValue .= $roman;
        //         break;
        //         }
        //     }
        // }
        

        // $yearNow = date('Y');
        // $id_pengajuan = Pengajuan::latest('id_pengajuan')->select('id_pengajuan')->value('id_pengajuan');
        // $no_pengajuan = "140"." /"."  ".($id_pengajuan+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'keterangan_1'  => $request->keterangan_1,
      'keterangan_2'  => $request->keterangan_2,
      'keterangan_3'  => $request->keterangan_3,
      'keterangan_4'  => $request->keterangan_4,
      
     );

     Pengajuan::where('id_pengajuan', $id_pengajuan)->update($form_data);

        if($form_data){
            return redirect('/lamanwarga/edit')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_pengajuan)
    { 
     $destroy = Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();

        if($destroy){
        return redirect('/lamanwarga/pengajuan')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }
}
