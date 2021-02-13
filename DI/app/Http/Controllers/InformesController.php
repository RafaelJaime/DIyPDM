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
    public function index()
    {
        $ciclos = cicle::all();
        $ofertas = offer::all();
        return view('pdf.index', compact('ciclos', 'ofertas'));
    }

    //--------------------------- Offers by Cycle ---------------------------
    public function Offers()
    {
        $users = cicle::all();
        $offers = offer::all();
        $applieds = applied::all();
        $years = offer::select('date_max')->get();

        $now = date("Y");

        return view('pdf.Offers', compact('users','offers','applieds','years','now'));
    }

    public function cicles()
    {
        $cicles = cicle::all();

        return view('pdf.UsersCycle', compact('cicles'));
    }

    public function GeneratePDFOffers(Request $request)
    {
        $year = $request->get('year');
        $users = cicle::all();
        $offers = offer::whereBetween('date_max', [$year . '-09-01', ($year + 1) . '-08-01'])->get();
        $pdf = PDF::loadView('pdf.OffersPDF', compact('users', 'offers'));
        return $pdf->stream();
        return $pdf->download('offers.pdf');
    }
    //--------------------------- End Offers ---------------------------



    //--------------------------- Users by Offers ---------------------------
    public function UsersByOffers(Request $request)
    {
        $filter = $request->get('cicle_id');
        $users = User::all();
        $offers = offer::where('cicle_id','=',$filter)->get();
        $applieds = applied::all();
        $cycles = cicle::all();
        return view('pdf.UsersOffer', compact('users', 'offers', 'applieds', 'cycles'));
    }
    
    public function OffersByCycle(Request $request)
    {
        $filter = $request->get('cicle_id');
        $users = User::all();
        $offers = offer::where('cicle_id','=',$filter)->get();
        $applieds = applied::all();
        $cicles = cicle::all();
        return view('pdf.UsersCycle', compact('users', 'offers', 'applieds', 'cicles'));
    }

    public function GeneratePDFUsers(Request $request)
    {
        $filter = $request->get('offer');
        $applieds = applied::where('offer_id', '=', $filter)->with('user')->get();
        $users = User::where('id', '=', $applieds[0]->user->id);
        $cycles = cicle::all();
        $pdf = PDF::loadView('pdf.UsersPDF', compact('users', 'applieds', 'cycles'));
        return $pdf->stream();
        return $pdf->download('Users.pdf');
    }

    //--------------------------- End Users by Offers ---------------------------
}
