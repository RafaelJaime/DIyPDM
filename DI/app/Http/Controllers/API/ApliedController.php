<?php

namespace App\Http\Controllers\API;

use App\applied;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApliedController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $applied = applied::create($input);
        return response()->json(['success' => true, 'data' => $applied->toArray()], $this->successStatus);
    }
    public function destroy(applied $applied)
    {
        $applied->delete();
        return response()->json(['success' => true, 'data' => $applied->toArray()], $this->successStatus);
    }
}
