<?php

namespace App\Http\Controllers\API;

use App\cicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CycleController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $cicles = cicle::all();
        return response()->json(['success' => true, 'data' => $cicles->toArray()], $this->successStatus);
    }
}
