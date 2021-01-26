<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function enviarEmail()
    {
        $data = [
            'emailto' => "kocetapedoretaplaystore@gmail.com",
            'subject' => "Mensaje importante",
            'content' => "Este es un correo de prueba",
        ];
        Mail::send('email/vistaEmail', $data, function ($message) use ($data) {
            $message->from('chimpancesjaimecamero@gmail.com');
            $message->to($data['emailto'])->subject($data['subject']);
        });
        return redirect('/');
    }
}
