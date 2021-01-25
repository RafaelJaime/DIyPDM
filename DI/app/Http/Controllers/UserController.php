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
        $user =  user::where('id',$id)->first();
        if($user->activate === 1){
            $user -> decrement('activate');
        } else {
            $user -> increment('activate');
        }
        return redirect('users');
}
}