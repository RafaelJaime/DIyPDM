<?php

namespace App\Http\Controllers;

use App\cicle;
use App\User;
use Illuminate\Http\Request;
use PDF;
class InformesController extends Controller
{
    public function index() {
        $ciclos = cicle::all();
        return view('pdf.index', compact('ciclos'));
    }
    public function users() 
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.archivo2', compact('users'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
    }

    public function page1()
    {
        $ciclos = cicle::all();
        return view('pdf.index', compact('ciclos'));
    }

    public function showOffersByCycle($id)
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.archivo2', compact('users'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
    }
}
