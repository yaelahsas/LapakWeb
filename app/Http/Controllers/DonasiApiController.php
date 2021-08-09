<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use File;

class DonasiApiController extends Controller
{
    public function pengajuanBuku(Request $request){

        $image = $request->file('foto_cover');
        $nama_file = str_replace(' ','',$request->judul_buku);
        $image_name = 'cover-'.$nama_file.'.'.$request->file('foto_cover')->extension();
        $path = public_path('img/buku/');

        $pengajuan = new Donasi;
        $pengajuan->judul_buku=$request->judul_buku;
        $pengajuan->jumlah_buku=$request->jumlah_buku;
        $pengajuan->jenis_buku=$request->jenis_buku;
        $pengajuan->alamat_donatur=$request->alamat_donatur;
        $pengajuan->foto_cover=$image_name;
        $pengajuan->donatur=$request->donatur;
        $pengajuan->status = 0;
        $pengajuan->sinopsis=$request->sinopsis;
        $pengajuan->jenis_donasi=$request->jenis_donasi;
        $pengajuan->save();

        $image->move($path, $image_name);
        return response()->json($pengajuan, 200);
    }

    public function pengajuanEbook(Request $request){
       
        $pengajuanebook = new Donasi;
        $pengajuanebook->judul_buku=$request->judul_buku;
        $pengajuanebook->jumlah_buku=$request->jumlah_buku;
        $pengajuanebook->jenis_buku=$request->jenis_buku;
        $pengajuanebook->alamat_donatur=$request->alamat_donatur;
        $pengajuanebook->donatur=$request->donatur;
        $pengajuanebook->status= 0;
        $pengajuanebook->sinopsis=$request->sinopsis;
        $pengajuanebook->jenis_donasi=$request->jenis_donasi;
        $pengajuanebook->save();

        return response()->json($pengajuanebook, 200);

    }

    public function donasiEbook(Request $request){

        $nama_file = str_replace(' ','',$request->judul_buku);
        $ebookf = $request->file('file_ebook');
        $nama_ebook = 'ebook-'.$nama_file.'.'.$request->file('file_ebook')->extension();
        $path = public_path('file/ebook/');

        $id = $request->id_donasi;

        $ebook = Donasi::where('id',$id)->first();
        $ebook->file_ebook = $nama_ebook;
        $ebook->judul_buku = $request->judul_buku;

        if ($ebook) {
            $ebook->update(['file_ebook'=> $nama_ebook]);
            $ebook->update(['status'=>$status = 2]);
        }

        $ebookf->move($path, $nama_ebook);
        return response()->json($ebook, 200);

        
    }

    public function donasiBuku(Request $request){

        $id = $request->id_donasi;
        $bukti = $request->bukti_donasi;

        $cetak = Donasi::where('id',$id)->first();
        $cetak->bukti_donasi = $bukti;

        if ($cetak) {
            $cetak->update(['bukti_donasi'=> $bukti]);
            $cetak->update(['status'=> $status = 2]);
        }

        return response()->json($cetak, 200);
        
    }

    public function infoDonasi(){
        
    }
}
