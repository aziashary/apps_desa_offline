<?php

namespace App\Http\Controllers;
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;

use Illuminate\Http\Request;
use App\Models\SK;
use App\Models\Kodesk;
use App\Models\Warga;
use App\Models\Pengajuan;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Writer\Html;

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
        $item= Kodesk::orderBy('jenis_sk', 'ASC')->get();
        return view('sk.create', compact('data','item'));
    }

    public function pengajuan()
    {
        $data = Pengajuan::where('status_pengajuan', 'Denied')
            ->orWhere('status_pengajuan', 'Approved')
            ->orderBy('created_at', 'DESC')
            ->with('wargas')->get();
        return view('sk.pengajuan', compact('data'));
    }

    public function pengajuan_baru()
    {
        $data = Pengajuan::where('status_pengajuan', 'Process')
            ->orderBy('created_at', 'DESC')
            ->with('wargas')->get();
        return view('sk.pengajuan_baru', compact('data'));
    }

    public function detail(Request $request, $id_pengajuan)
    {
        $request->validate([
            'status_pengajuan' => 'required', // Add validation rule for status_pengajuan field
        ]);
        $update = Pengajuan::where('id_pengajuan', $id_pengajuan)->update([
            'status_pengajuan' => $request->status_pengajuan,
        ]);

        // Variable Memasukan data ke table SK
            if($request->status_pengajuan == 'Approved'){
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
            $no_sk = ($request->kode_sk)." /"."  ".($id_sk+1)."  "."/ ".$returnValue." / ".$yearNow;

        $form_data = array(
        'no_sk'  => $no_sk,
        'kode_sk' => $request->kode_sk,
        'jenis_sk' => $request->jenis_pengajuan,
        'id_warga'  => $request->id_warga,
        'keterangan_1'  => $request->keterangan_1,
        'keterangan_2'  => $request->keterangan_2,
        'keterangan_3'  => $request->keterangan_3,
        'keterangan_4'  => $request->keterangan_4,
        
        );

        $sk=SK::create($form_data);
            }

        if($update){
            return redirect('admindesa/SK/pengajuan_baru')->with('success','Berhasil Update Status Data');
        }else{
            return back()->with('error','Gagal Memperbarui Data');
        } 
    }

    function print($id_sk)
    { 
    //  $data = SK::where('id_sk', $id_sk)->with('wargas')->get();
    //  return view('sk.print', compact('data'));

    // Load the XLS file
    $data = SK::where('id_sk', $id_sk)->with('sks')->first();
    $inputFileType = 'Xls';
    $inputFileName = public_path($data->sks->url_print);
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the active sheet of the XLS file
    $worksheet = $spreadsheet->getActiveSheet();

    // Retrieve data from the database using Laravel's query builder
    // Data SK
    $item = SK::where('id_sk', $id_sk)->with('wargas')->first();
    
    // Keterangan SK
    

    // Insert the data into the appropriate cells in the XLS file
    $worksheet->setCellValue('F8', $item->no_sk);

    $worksheet->setCellValue('F13', $item->wargas->nama_warga);
    $worksheet->setCellValue('F14', $item->wargas->nik);
    $worksheet->setCellValue('F15', $item->wargas->tempat_lahir, $item->wargas->tanggal_lahir);
    $worksheet->setCellValue('F16', $item->wargas->jenis_pekerjaan);
    $worksheet->setCellValue('F17', $item->wargas->agama);
    $worksheet->setCellValue('F18', $item->wargas->alamat);

    $worksheet->setCellValue('F22', $item->keterangan_1);
    $worksheet->setCellValue('F23', $item->keterangan_2);

    $worksheet->setCellValue('J27', date('d-m-Y', strtotime($item->created_at)));
    


    // Convert the Excel file to HTML
    $writer = new Html($spreadsheet);
    $writer->save('plugin\file.html');

    // Set the headers to display the HTML directly in the browser
    header('Content-Type: text/html; charset=utf-8');
    header('Content-Disposition: inline; filename="file.html"');
    header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

    // Output the HTML file to the browser
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>Print SKU</title>
            </head>
            <body onload="window.print();">';
    echo file_get_contents('plugin\file.html');
    echo '</body>
          </html>';
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
        $no_sk = ($request->kode_sk)." /"."  ".($id_sk+1)."  "."/ ".$returnValue." / ".$yearNow;
        $jenis_sk = Kodesk::where('kode_sk', $request->kode_sk)->pluck('jenis_sk')->first();

     $form_data = array(
      'no_sk'  => $no_sk,
      'kode_sk' => $request->kode_sk,
      'jenis_sk' => $jenis_sk,
      'id_warga'  => $request->id_warga,
      'keterangan_1'  => $request->keterangan_1,
      'keterangan_2'  => $request->keterangan_2,
      'keterangan_3'  => $request->keterangan_3,
      'keterangan_4'  => $request->keterangan_4,
      
     );

     $sk = SK::create($form_data);

        if($sk){
            return redirect('admindesa/SK')->with('success','Data berhasil ditambahkan!');
        } else {
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
      'keterangan_1'  => $request->keterangan_1,
      'keterangan_2'  => $request->keterangan_2,
      'keterangan_3'  => $request->keterangan_3,
      'keterangan_4'  => $request->keterangan_4,
      
     );

     SK::where('id_sk', $id_sk)->update($form_data);

        if($form_data){
            return redirect('admindesa/SK')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_sk)
    { 
     $destroy = SK::where('id_sk', $id_sk)->delete();

        if($destroy){
        return redirect('admindesa/SK')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }

    
}
