<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $users = User::all();
        return response()->json(['success' => true, 'data' => $users->toArray()], $this->successStatus);
    }

   
}