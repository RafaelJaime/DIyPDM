<?php

namespace App\Http\Controllers\API;

use App\article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $articles = article::all();
        return response()->json(['success' => true, 'data' => $articles->toArray()], $this->successStatus);
    }

    public function show($id)
    {
        $article = article::where('cicle_id', $id)->get();
        return response()->json(['success' => true, 'data' => $article->toArray()], $this->successStatus);
    }
}
