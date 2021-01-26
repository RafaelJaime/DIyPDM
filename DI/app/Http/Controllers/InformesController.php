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
    
    //--------------------------- Offers by Cycle ---------------------------
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



    //--------------------------- Users by Offers ---------------------------
    public function users() 
    {
        $users = User::all();
        $offers = offer::all();
        $applieds = applied::all();
        $cycles = cicle::all();
        return view('pdf.Users', compact('users','offers','applieds','cycles'));
    }

    public function GeneratePDFUsers() {
        $users = cicle::all();
        $offers = offer::all();
        $applieds = applied::all();
        $cycles = cicle::all();
        $pdf = PDF::loadView('pdf.UsersPDF', compact('users','offers','applieds','cycles'));
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        return $pdf->download('Users.pdf');
    }

    //--------------------------- End Users by Offers ---------------------------
}
