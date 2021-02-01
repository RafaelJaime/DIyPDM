<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function index()
    {
        return view('email.index');
    }
    public function envio(Request $request)
    {
        $data = [
            'emailto' => $request->get('to'),
            'subject' => $request->get('subject'),
            'content' => $request->get('contenido'),
        ];

        Mail::send('email.vistaEmail', $data, function ($message) use ($data) {
            $message->from('chimpancesjaimecamero@gmail.com');
            $message->to($data['emailto'])->subject($data['subject']);
        });

        return redirect('completeEmail');
    }
    public function complete()
    {
        return view('email.complete');
    }
}
