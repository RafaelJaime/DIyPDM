<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
        $activate = $request -> get('filter');

        $datos['users']=User::where('activate',$activate)->paginate(5);

        return view('users.index', $datos);
    }
}
