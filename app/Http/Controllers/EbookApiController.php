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

    public function tambahBaca(Request $request) {
        $id = $request->id_buku;

        $buku = Buku::where('id',$id)->first();
        $lastbaca = $buku->jumlah_baca;

        if ($buku) {
            $buku->update(['jumlah_baca'=> $lastbaca+1]);
        }
        return response()->json( $buku, 200);

    }

}