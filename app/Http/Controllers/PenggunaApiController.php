<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaApiController extends Controller
{
        public function tampilUser(){
        $pengguna=$request->pengguna_id;
        
        $pengguna= User::find($pengguna);
        return response()->json($pengguna, 200);
    }
}