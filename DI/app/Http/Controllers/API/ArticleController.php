<?php

namespace App\Http\Controllers\API;

use App\article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ArticleController extends Controller
{
    public $successStatus = 200;
    public function index() {
        $articles = article::all();
        return response()->json(['success'=> true, 'data' => $articles->toArray()], $this->successStatus);
    }
    public function show($id) {
        $article = article::find($id);
        if(is_null($article)){
            return response()->json(['error'=>  $validator->errors()], 401);
        }
        return response()->json(['success'=> true, 'data' => $article->toArray()], $this->successStatus);
    }
}