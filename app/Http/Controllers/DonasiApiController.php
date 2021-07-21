<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;

class DonasiApiController extends Controller
{
    public function pengajuanDonasi(Request $request){

        $uploaded_files = $request->file->store('img/buku/');

        $pengajuan = new Donasi;
        $pengajuan->judul_buku=$request->judul_buku;
        $pengajuan->jumlah_buku=$request->jumlah_buku;
        $pengajuan->jenis_buku=$request->jenis_buku;
        $pengajuan->alamat_donatur=$request->alamat_donatur;
        $pengajuan->foto_cover=$request->file->hasName();
        $pengajuan->file_ebook=$request->file->hasName();
        $pengajuan->donatur=$request->donatur;
        $pengajuan->save();

        return response()->json($pengajuan, 200);
    }

    public function donasiBuku(Request $request){
        $cetak = new Donasi;
        $cetak->judul_buku=$request->judul_buku;
        $cetak->jumlah_buku=$request->jumlah_buku;
        $cetak->jenis_buku=$request->jenis_buku;
        $cetak->alamat_donatur=$request->alamat_donatur;
        $cetak->foto_cover=$request->foto_cover;
        $cetak->file_ebook=$request->file_ebook;
        $cetak->donatur=$request->donatur;
        $cetak->save();

        return response()->json($cetak, 200);


    }

    public function donasiEbook(Request $request){

        $ebook = new Donasi;
        $ebook->judul_buku=$request->judul_buku;
        $ebook->jumlah_buku=$request->jumlah_buku;
        $ebook->jenis_buku=$request->jenis_buku;
        $ebook->alamat_donatur=$request->alamat_donatur;
        $ebook->foto_cover=$request->foto_cover;
        $ebook->file_ebook=$request->file_ebook;
        $ebook->donatur=$request->donatur;
        $ebook->save();

        return response()->json($ebook, 200);

        
    }

    public function infoDonasi(){
        
    }
}
