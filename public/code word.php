// Load the Word file
     $data = SK::where('id_sk', $request->id_sk)->with('sks')->first();
     $phpword = new \PhpOffice\PhpWord\TemplateProcessor(public_path($data->sks->url_print));

    //  Sett Values
    $item = SK::where('id_sk', $request->id_sk)->with('wargas')->first();
    $kets = Keterangansk::where('kode_sk', $data->kode_sk)->first();
    $aparatur = Aparaturdesa::where('id_aparatur', $request->ttd_kepala)->first();
    $phpword->setValues([
        'nama' => $item->wargas->nama_warga,
        'no_sk' => $item->no_sk
    ]);
    $phpword->saveAs('edit.docx');

    download
    // Load the Word file
    $data = SK::where('id_sk', $request->id_sk)->with('sks')->first();
    $phpword = new \PhpOffice\PhpWord\TemplateProcessor(public_path($data->sks->url_print));

   //  Sett Values
   $item = SK::where('id_sk', $request->id_sk)->with('wargas')->first();
   $kets = Keterangansk::where('kode_sk', $data->kode_sk)->first();
   $aparatur = Aparaturdesa::where('id_aparatur', $request->ttd_kepala)->first();
   $phpword->setValues([
       'nama' => $item->wargas->nama_warga,
       'no_sk' => $item->no_sk
   ]);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=template.docx");

    // $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
    $phpword->saveAs('php://output');