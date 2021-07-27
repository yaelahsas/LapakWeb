<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class EbookApiController extends Controller
{
    public function tampilEbook() {
        $ebook= Buku::where('jenis_buku','ebook')->get();
        return response()->json(["ebook" => $ebook], 200);
    }

}