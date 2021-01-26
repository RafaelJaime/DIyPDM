<?php

namespace App\Http\Controllers;

use App\applied;
use App\cicle;
use App\offer;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use PDF;
class InformesController extends Controller
{
    public function index() {
        $ciclos = cicle::all();
        $ofertas = offer::all();
        return view('pdf.index', compact('ciclos', 'ofertas'));
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

    public function showOffersByCycle($id)
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.archivo2', compact('users'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('prueba.pdf');
    }
    
    //--------------------------- Offers ---------------------------
    public function Offers() {
        $users = cicle::all();
        $offers = offer::all();
        $applieds = applied::all();
        $years = offer::select('date_max')->get();

        return view('pdf.Offers', compact('users','offers','applieds','years'));
    }

    public function getYear($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("Y");
    }

    public function GeneratePDFOffers() {
        $users = cicle::all();
        $offers = offer::all();
        $applieds = applied::all();
        $pdf = PDF::loadView('pdf.OffersPDF', compact('users','offers','applieds'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        return $pdf->download('offers.pdf');
    }
    //--------------------------- End Offers ---------------------------

    public function pagina2() {
        $ciclos = cicle::all();
        $ofertas = offer::all();
        return view('pdf.page2', compact('ciclos', 'ofertas'));
    }
    public function mostrarOfertas($id) {
        $ofertas = offer::where('cicle_id', $id)->get();
        return view('pdf.page21', compact('ofertas'));
    }
}
