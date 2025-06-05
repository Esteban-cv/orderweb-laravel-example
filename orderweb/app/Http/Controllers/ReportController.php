<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        return view('reports.index');
    }

    /**
     * Reporte que genera el listado de todos los tecnicos
     */
    public function export_technician() {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );

        $pdf = Pdf::loadView('reports.export_technicians', $data)->setPaper('letter','portrait');

        return $pdf->download('técnicos.pdf');
    }
}
