<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGejala = Gejala::count();
        $totalPenyakit = Penyakit::count();
        $totalBasisPengetahuan = BasisPengetahuan::count();
        return view('admin.dashboard.index', [
                    'title' => 'Dashboard',
                    'header' => 'Dashboard Admin',
                    'totalGejala' => $totalGejala,
                    'totalPenyakit' => $totalPenyakit,
                    'totalBasisPengetahuan' => $totalBasisPengetahuan,
                ]);
    }


}
