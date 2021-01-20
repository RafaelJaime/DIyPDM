<?php

namespace App\Http\Controllers;

use App\cicle;
use Illuminate\Http\Request;
use PDF;
class InformesController extends Controller
{
    public function index() {
        $ciclos = cicle::all();
        return view('pdf.index', compact('ciclos'));
    }
    public function general() 
    {
        $ciclos = cicle::all();
        $pdf = PDF::loadView('pdf.archivo1', compact('ciclos'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
    }
}
