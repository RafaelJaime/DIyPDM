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
            'emailto' => explode(',', $request->get('to')),
            'subject' => $request->get('subject'),
            'content' => $request->get('contenido'),
            'file' => $request['file'],
        ];
        Mail::send('email.vistaEmail', $data, function ($message) use ($data) {
            $message->from('chimpancesjaimecamero@gmail.com');
            $message->to($data['emailto'])->subject($data['subject']);
            if ($data['file'] != null) {
                $message->attach($data['file']->getRealPath(), [
                    'as' => request()->file('file')->getClientOriginalExtension(),
                    'mime'=> request()->file('file')->getMimeType()]);
            }
            
        });
        return redirect('completeEmail');
    }
    public function complete()
    {
        return view('email.complete');
    }
}
