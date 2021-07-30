<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\User;
use App\Simpan;

class SimpanApiController extends Controller
{
    public function daftarSimpan(Request $request) {
        $s = $this->validate ($request, [
            'user_id'=>'required',
            'buku_id'=>'required',
        ]);

        if ($s) {
            $simpan = new simpan();
            $simpan->user_id = $request['user_id'];
            $simpan->buku_id = $request['buku_id'];
            $simpan->save();
        }
        
        return response()->json( $simpan, 200);

    }

}
