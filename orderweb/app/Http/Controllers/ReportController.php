<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use App\Models\Technician;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $technicians = Technician::all();
        return view('reports.index', compact('technicians', 'orders'));
    }

    /**
     * Reporte que genera el listado de todos los tecnicos
     */
    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );

        $pdf = Pdf::loadView('reports.export_technicians', $data)->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

        return $pdf->download('Técnicos.pdf');
    }

    public function export_activities_by_technician(Request $request)
    {
        $activities = Activity::where('technician_id', '=', $request['technician_id'])->get();
        $data = array(
            'activities' => $activities
        );

        $pdf = Pdf::loadView('reports\export_activities_by_technician', $data)->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

        return $pdf->download('ActividadesPorTécnico-' . $request['technician_id'] . '.pdf');
    }

    public function export_orders_by_date(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ], [
            'start_date.required' => 'La fecha de inicio es obligatoria',
            'end_date.required' => 'La fecha de fin es obligatoria',
            'end_date.after_or_equal' => 'La fecha fin debe ser mayor o igual a la fecha inicio'
        ]);

        $startDate = Carbon::parse($validated['start_date'])->startOfDay();
        $endDate = Carbon::parse($validated['end_date'])->endOfDay();

        $orders = Order::whereBetween('legalization_date', [$startDate, $endDate])->with(['causal', 'observation'])->orderBy('legalization_date', 'asc')->get();

        if ($orders->isEmpty()) {
            return back()->with('warning', 'No se encontraron órdenes en el rango de fechas seleccionado');
        }

        $data = [
            'orders' => $orders,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_orders' => $orders->count(),
            'date_generation' => now()->format('d/m/Y H:i:s')
        ];
        $pdf = Pdf::loadView('reports.export_orders_by_date', $data)->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

        return $pdf->download('OrdenesPorFecha_'. Carbon::parse($validated['start_date'])->format('d-m-Y') . '_al_' . Carbon::parse($validated['end_date'])->format('d-m-Y') .'.pdf');
    }
}
