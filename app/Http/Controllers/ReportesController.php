<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailReservVueloHotel;
use App\Models\hotel;
use App\Models\Detail_vuelo_cliente;
use App\Models\reservacion;
use App\Models\sucursal;
use App\Models\vuelo;
use App\Models\claseVuelo;
use App\Models\Cliente; 
use PDF;

class ReportesController extends Controller
{
    public function indexGet(Request $request)
    {
        return view("reportes.indexGet", [
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Reportes" => url("/reportes")
            ]
        ]);
    }

    public function sucursalesClientesGet()
    {
        $sucursales = Sucursal::withCount(['reservaciones' => function ($query) {
            $query->select(\DB::raw('count(distinct(NIFCliente))'));
        }])->get();
    
        return view('reportes.sucursalesClientes', [
            'sucursales' => $sucursales,
            'breadcrumbs' => [
                "Inicio" => url("/"),
                "Reportes" => url("/reportes"),
                "Sucursales y Clientes" => url("/reportes/sucursales-clientes")
            ]
        ]);
    }

    public function showReservacionesPorPeriodoForm()
    {
        $breadcrumbs = [
            "Inicio" => url("/"),
            "Reportes" => url("/reportes"),
            "Filtrar Reservaciones por Periodo" => url("/reportes/reservaciones-por-periodo")
        ];

        return view('reportes.reservacionesPorPeriodo', compact('breadcrumbs'));
    }

    public function reservacionesPorPeriodo(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $reservaciones = Reservacion::whereBetween('fechaReservacion', [$request->fecha_inicio, $request->fecha_fin])->get();
    
        $breadcrumbs = [
            "Inicio" => url("/"),
            "Reportes" => url("/reportes"),
            "Resultados del Filtrado" => url("/reportes/reservaciones-por-periodo")
        ];
    
        return view('reportes.resultadoReservaciones', [
            'reservaciones' => $reservaciones,
            'breadcrumbs' => $breadcrumbs,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin
        ]);
    }

    public function reservasFechaPDF(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $reservacionesActivas = Reservacion::whereBetween('fechaReservacion', [$fecha_inicio, $fecha_fin])->get();

        $logoBase64 = $this->base64EncodeImage(public_path('Logo.png'));
    
        $pdf = PDF::loadView('reportes.resultadoReservacionesPDF', [
            'reservaciones' => $reservacionesActivas,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'logoBase64' => $logoBase64
        ]);
    
        return $pdf->download('reportes.descargar.pdf');
    }

    public function viewreservasFechaPDF(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $reservaciones = Reservacion::whereBetween('fechaReservacion', [$fecha_inicio, $fecha_fin])->get();
        
        $logoBase64 = $this->base64EncodeImage(public_path('Logo.png'));

        $pdf = PDF::loadView('reportes.resultadoReservacionesPDF', compact('reservaciones', 'fecha_inicio', 'fecha_fin', 'logoBase64'));
        return $pdf->stream('reservaciones_activas.pdf');
    }

    public function showSucursalesGenerales()
    {
        $breadcrumbs = [
            "Inicio" => url("/"),
            "Reportes" => url("/reportes"),
            "Reporte de Sucursales Activas" => url("/reportes/sucursales-generales")
        ];
        
        $sucursales = Sucursal::all();
        return view('reportes.sucursalesGenerales', compact('sucursales', 'breadcrumbs'));
    }
    
    public function viewSucursalesGeneralesPDF()
    {
        $sucursales = Sucursal::all();
        $logoBase64 = $this->base64EncodeImage(public_path('Logo.png'));

        $pdf = PDF::loadView('reportes.sucursalesGeneralesPDF', compact('sucursales', 'logoBase64'));
        return $pdf->stream('sucursales_generales.pdf');
    }
    
    public function downloadSucursalesGeneralesPDF()
    {
        $sucursales = Sucursal::all();
        $logoBase64 = $this->base64EncodeImage(public_path('Logo.png'));

        $pdf = PDF::loadView('reportes.sucursalesGeneralesPDF', compact('sucursales', 'logoBase64'));
        return $pdf->download('sucursales_generales.pdf');
    }

    public function showReservacionesActivas()
    {
        $reservaciones = Reservacion::where('estado', '1')->get(); // Asumiendo que 'activo' es un estado válido
    
        $breadcrumbs = [
            "Inicio" => url("/"),
            "Reportes" => url("/reportes"),
            "Reporte de Sucursales Activas" => url("/reportes/sucursales-generales")
        ];
    
        return view('reportes.reservacionesActivas', compact('reservaciones', 'breadcrumbs'));
    }

    public function downloadReservacionesActivasPDF()
    {
        $reservaciones = Reservacion::where('estado', '1')->get();
        $logoBase64 = $this->base64EncodeImage(public_path('Logo.png'));

        $pdf = PDF::loadView('reportes.reservacionesActivasPDF', compact('reservaciones', 'logoBase64'));
        return $pdf->download('reservaciones_activas.pdf');
    }

    public function graficaReservacionesSucursal()
    {
        $breadcrumbs = [
            "Inicio" => url("/"),
            "Reportes" => url("/reportes"),
            "Gráfica de Reservaciones por Sucursal" => url("/reportes/grafica-reservaciones-sucursal")
        ];
    
        $data = Reservacion::selectRaw('sucursal.nombreSucursal, COUNT(*) as total')
            ->join('sucursal', 'reservacion.IDSucursal', '=', 'sucursal.IDSucursal')
            ->where('reservacion.estado', '1')
            ->groupBy('sucursal.nombreSucursal')
            ->get();
    
        return view('reportes.graficaReservaciones', compact('data', 'breadcrumbs'));
    }

    function base64EncodeImage($path) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}
