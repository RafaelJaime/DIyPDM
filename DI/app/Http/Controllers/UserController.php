<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){

        $filter=$request->get('filter');
        if($filter === '1' || $filter === '0'){
            $datos['users']=User::where('activate','=',$filter)->paginate(10);
        } else {
            $datos['users']=User::paginate(10);
        }
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