<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TokenController extends Controller
{
    public function create(Request $request){
        $token = $request->user()->createToken("beer_api_token");

        return view('token', [
            'token' => $token
        ]);
    }

    public function destroy(Request $request, $token){
        $request->user()->tokens()->where('id', $token)->delete();
        return redirect()->route('dashboard')->with('status', 'Token deleted!');
    }
}
