<?php

namespace App\Http\Controllers\API;

use App\offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $offers = offer::all();
        return response()->json(['success' => true, 'data' => $offers->toArray()], $this->successStatus);
    }

    public function show($id) {
        $offer = offer::where('cicle_id', $id)->get();
        $offer = offer::find($id);
        if(is_null($offer)){
            return response()->json(['error'=>  $validator->errors()], 401);
        }
        return response()->json(['success'=> true, 'data' => $offer->toArray()], $this->successStatus);
    }

    // public function store(Request $request) {
    //     $input = $request->all();
    //     $offer = offer::create($input);
    //     return response()->json(['offer' => $offer->toArray()], $this->successStatus);
    // }

    // public function update(Request $request, offer $offer) {
    //     $input = $request->all();
    //     $offer->title = $input['title'];
    //     $offer->description = $input['description'];
    //     $offer->cicle_id = $input['cicle_id'];
    //     $offer->save();
    //     return response()->json(['offer' => $offer->toArray()], $this->successStatus);
    // }
    
    // public function destroy(offer $offer) {
    //     $offer->delete();
    //     return response()->json(['offer' => $offer->toArray()], $this->successStatus);
    // }
}