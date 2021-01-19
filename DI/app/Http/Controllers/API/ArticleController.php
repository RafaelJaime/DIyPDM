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

    public function show($id) {
        $article = article::find($id);
        if(is_null($article)){
            return response()->json(['error'=>  $validator->errors()], 401);
        }
        return response()->json(['success'=> true, 'data' => $article->toArray()], $this->successStatus);
    }

    // public function store(Request $request) {
    //     $input = $request->all();
    //     $article = article::create($input);
    //     return response()->json(['article' => $article->toArray()], $this->successStatus);
    // }

    // public function update(Request $request, Article $article) {
    //     $input = $request->all();
    //     $article->title = $input['title'];
    //     $article->description = $input['description'];
    //     $article->cicle_id = $input['cicle_id'];
    //     $article->save();
    //     return response()->json(['article' => $article->toArray()], $this->successStatus);
    // }
    
    // public function destroy(Article $article) {
    //     $article->delete();
    //     return response()->json(['article' => $article->toArray()], $this->successStatus);
    // }
}
