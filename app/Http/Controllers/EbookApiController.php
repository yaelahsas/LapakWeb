<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategori;

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

    public function tampilJenisKategori() {
        $jenis_kategori = Kategori::all();
        return response()->json($jenis_kategori, 200);
    }

    public function tampilKategoriEbook() {
        $kategori_ebook = Buku::select('bukus.id as buku_id','bukus.judul_buku','bukus.nama_pengarang','bukus.tahun_terbit','bukus.penerbit','bukus.jumlah_halaman','bukus.jumlah_buku','bukus.jenis_buku','bukus.foto_cover','kategoris.nama_kategori')
                        ->join('kategoris','kategoris.id','=','bukus.kategori_id')
                        ->where('jenis_buku', 'ebook')
                        ->orderBy('bukus.id','desc')
                        ->get();
        return response()->json($kategori_ebook, 200);
    }

    public function tampilEbookBaru(){

    }

}