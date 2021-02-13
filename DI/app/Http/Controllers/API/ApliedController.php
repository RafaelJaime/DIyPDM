<?php

namespace App\Http\Controllers\API;

use App\applied;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\offer;
use App\User;
use Validator;

class ApliedController extends Controller
{
    public $successStatus = 200;

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'offer_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
           
        $applied = applied::create($input);
        $offer = offer::where('id', $input['offer_id']);
        $offer -> increment('num_candidates');
        return response()->json(['success' => true, 'data' => $applied->toArray()], $this->successStatus);
    }
    public function destroy(applied $applied)
    {
        $applied->delete();
        return response()->json(['success' => true, 'data' => $applied->toArray()], $this->successStatus);
    }
}
