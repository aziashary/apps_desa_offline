<?php

namespace App\Http\Controllers;
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;

use Illuminate\Http\Request;
use App\Models\SK;
use App\Models\Warga;

class SKController extends Controller
{
    function index()
    { 

     $data = SK::orderBy('no_sk', 'ASC')->with('wargas')->get();
     return view('sk.index', compact('data'));
    }

    function create()
    { 
        $data= Warga::orderBy('nama_warga', 'ASC')->get();
        return view('sk.create', compact('data'));
    }

    function print($id_sk)
    { 
     $data = SK::where('id_sk', $id_sk)->with('wargas')->get();
     return view('sk.print', compact('data'));
    }

    function edit($id_sk)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = SK::where('id_sk', $id_sk)->get();
        return view('sk.edit', [
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
        $id_sk = SK::latest('id_sk')->select('id_sk')->value('id_sk');
        $no_sk = "510"." /"."  ".($id_sk+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'no_sk'  => $no_sk,
      'id_warga'  => $request->id_warga,
      'jenis_usaha'  => $request->jenis_usaha,
      'alamat_usaha'  => $request->alamat_usaha,
      
     );

     SK::create($form_data);

        if($form_data){
            return redirect('/SK')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_sk)
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
        // $id_sk = SK::latest('id_sk')->select('id_sk')->value('id_sk');
        // $no_sk = "140"." /"."  ".($id_sk+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'jenis_usaha'  => $request->jenis_usaha,
      'alamat_usaha'  => $request->alamat_usaha,
      
     );

     SK::where('id_sk', $id_sk)->update($form_data);

        if($form_data){
            return redirect('/SK')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_sk)
    { 
     $destroy = SK::where('id_sk', $id_sk)->delete();

        if($destroy){
        return redirect('/SK')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }

    
}
