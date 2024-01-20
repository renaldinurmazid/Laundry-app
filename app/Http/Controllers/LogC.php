<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogC extends Controller
{
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()-> id,
            'activity' => "User Di Halaman Log"
        ]);
        $subtitle = "Daftar Activity";
        $LogM = LogM::select('users.*', 'log.*')->join('users', 'users.id', '=', 'log.id_user')->get();
        return view('log_index', compact('subtitle', 'LogM'));
    }
}
