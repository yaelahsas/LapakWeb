<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuApiController extends Controller
{
    public function tampilBuku() {
        $buku = Buku::all();
        return response()->json($buku, 200);
    }
}
