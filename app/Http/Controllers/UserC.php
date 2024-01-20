<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtitle = "Daftar Pengguna";
        $data = User::all();
        return view('user.index', compact('subtitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $subtitle = "Tambah User";
        $data = User::all();
        return view('user.create', compact('subtitle', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',

        ]);

        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'password' =>$request->password,
            'role' => $request->role,
        ];

        User::create($data);

        return redirect()->route('users')->with('success', 'user berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $subtitle = "Edit User";
        $users = User::find($id);

        return view('user.edit', compact('subtitle', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'role' => $request->role,
        ];

        User::find($id)->update($data);

        return redirect()->route('users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('users');
    }
}
