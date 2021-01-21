<?php

namespace App\Http\Controllers;

use App\cicle;
use App\offer;
use App\User;
use Illuminate\Http\Request;
use PDF;
class InformesController extends Controller
{
    public function index() {
        $ciclos = cicle::all();
        $ofertas = offer::all();
        return view('pdf.index', compact('ciclos', 'ofertas'));
    }
    public function general() 
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.archivo2', compact('users'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
    }
    public function pagina1() {
        return redirect ('/');
    }
    public function pagina2() {
        return redirect ('/');
    }
}
