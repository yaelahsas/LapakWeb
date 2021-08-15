<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapak;

class LapakApiController extends Controller
{
    public function tampilLapak() {
        $jadwal= Lapak::all();
        return response()->json($jadwal, 200);
    }

    

    
}