<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SimpanEbook;

class SimpanEbookApiController extends Controller
{
    public function daftarSimpan(Request $request) {
        $s = $this->validate ($request, [
            'user_id'=>'required',
            'buku_id'=>'required',
        ]);

        if ($s) {
            $simpan = new SimpanEbook();
            $simpan->user_id = $request['user_id'];
            $simpan->buku_id = $request['buku_id'];
            $simpan->save();
        }
        
        return response()->json( $simpan, 200);

    }

    public function tampilSimpan(Request $request){
        $user_id = $request->user_id;

        $tampil_simpan= SimpanEbook::where('user_id', $user_id);
        return response()->json(["tampil" => $tampil_simpan], 200);
    }

}

