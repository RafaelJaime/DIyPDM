<?php

namespace App\Http\Controllers\API;

use App\article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all();
        return response()->json(['data' => $articles->toArray()], $this->successStatus);
    }
}
