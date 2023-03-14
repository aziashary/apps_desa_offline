<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SKKM;
use App\Models\Warga;
use App\Models\SKU;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardwargaController extends Controller
{
    function index()
    {
     $warga = Warga::count();
     $sku = SKU::count();
     $skkm = SKKM::count();
     $total = SKU::count() + SKKM::count();
     $chart = LarapexChart::setType('donut')
                ->setDataset([
                    SKKM::count(),
                    SKU::count()
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

     return view('layouts.dashboardwarga', [
        'warga' => $warga, 
        'sku' => $sku,
        'skkm' => $skkm,
        'total' => $total,
        'chart' => $chart,
        'char' => $char
     ]);
    }
}
