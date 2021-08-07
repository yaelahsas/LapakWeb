<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaApiController extends Controller
{
        public function tampilUser() {
        $pengguna= User::where('role_id',2)->get();
        return response()->json($pengguna, 200);
    }
}