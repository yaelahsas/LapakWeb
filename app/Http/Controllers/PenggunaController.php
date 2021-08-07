<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.pengguna');
    }
}
