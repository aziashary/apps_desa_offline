<?php

namespace App\Http\Controllers;
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;

use Illuminate\Http\Request;
use App\Models\SKU;
use App\Models\Warga;

class SKUController extends Controller
{
    function index()
    { 

     $data = SKU::orderBy('no_sku', 'ASC')->with('wargas')->get();
     return view('sku.index', compact('data'));
    }

    function create()
    { 
        $data= Warga::orderBy('nama_warga', 'ASC')->get();
        return view('sku.create', compact('data'));
    }

    function print($id_sku)
    { 
     $data = SKU::where('id_sku', $id_sku)->with('wargas')->get();
     return view('sku.print', compact('data'));
    }

    function edit($id_sku)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = SKU::where('id_sku', $id_sku)->get();
        return view('sku.edit', [
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
        $id_sku = SKU::latest('id_sku')->select('id_sku')->value('id_sku');
        $no_sku = "510"." /"."  ".($id_sku+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'no_sku'  => $no_sku,
      'id_warga'  => $request->id_warga,
      'jenis_usaha'  => $request->jenis_usaha,
      'alamat_usaha'  => $request->alamat_usaha,
      
     );

     SKU::create($form_data);

        if($form_data){
            return redirect('/SKU')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_sku)
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
        // $id_sku = SKU::latest('id_sku')->select('id_sku')->value('id_sku');
        // $no_sku = "140"." /"."  ".($id_sku+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'jenis_usaha'  => $request->jenis_usaha,
      'alamat_usaha'  => $request->alamat_usaha,
      
     );

     SKU::where('id_sku', $id_sku)->update($form_data);

        if($form_data){
            return redirect('/SKU')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_sku)
    { 
     $destroy = SKU::where('id_sku', $id_sku)->delete();

        if($destroy){
        return redirect('/SKU')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }

    
}
