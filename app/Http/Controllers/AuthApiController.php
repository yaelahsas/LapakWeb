<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthApiController extends Controller
{
    public function register(Request $request){
        $user = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'api_token' => Str::random(64),
            'role_id' => 2,
        ];

        User::create($user);

        $token = User::select('api_token')->where('email', $request->email)->first();

        if ($user != null) {
            $pesan = [
                        "message" => "Daftar Berhasil",
                        // "error" => false,
                        "Token" => $token->api_token,

                    ];
                     return response()->json($pesan,200);
        } else {
            $pesan = [
                        "message" => "Daftar Gagal",
                        "error" => true
                    ];
        }

        return response()->json($pesan,422);
}

    public function login(Request $request){
       $pengguna = User::where('email', $request->email)->first();

       if ($pengguna) {
           if(password_verify($request->password, $pengguna->password)){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat Datang '.$pengguna->nama,
                'user' => $pengguna
            ]);
           }
           
           return response()->json([
            'success' => 0,
            'messages' => 'password salah'
        ]);
       }

            return response()->json([
                'success' => 0,
                'messages' => 'email tidak terdaftar'
            ]);
    }

    public function reset(Request $request){
        $email = $request->email;
        $nomor_telepon = $request->nomor_telepon;

        $user = User::where('email', $email)->where('nomor_telepon', $nomor_telepon)->first();

        if(isset($user)){
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'success' => 1,
                'message' => 'reset  berhasil'
            ]);

        }
}


}