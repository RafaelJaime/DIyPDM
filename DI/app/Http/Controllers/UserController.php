<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
        $activate = $request -> get('filter');

        $datos['users']=User::all();

        return view('users.index', $datos);
    }

    public function update($id){

        $valor =  user::where('id',$id);
        if($valor = user::where('id',$id)->where('activate','=','0')){
            $valor -> increment('activate');
        }
        elseif($valor = user::where('id',$id)->where('activate','=','1')){
            $valor -> decrement('activate');
        }
        return redirect('users');
}
}
