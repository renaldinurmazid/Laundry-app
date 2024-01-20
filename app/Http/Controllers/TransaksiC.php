<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtitle = "Transaksi";
        $data = Transaksi::all();
        return view('transaksi.index', compact('subtitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $subtitle = "Tambah Transaksi";
        $data = Produk::all();
        return view('transaksi.create', compact('subtitle', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {

        $request->validate([
        'nomor_unik' => 'required',
        'nama_pelanggan' => 'required',
        'produk' => 'required:exists:produk,id',
        'jumlah_itm_kg' => 'required',
        'total_bayar' => 'required',
        'uang_bayar' => 'required',
        'uang_kembali' => 'required',
        'status' => 'required',
        ]);


    Transaksi::create([
        'nomor_unik' => $request->input('nomor_unik'),
        'nama_pelanggan' => $request->input('nama_pelanggan'),
        'id_produk' => $request->input('produk'),
        'jumlah_itm_kg' => $request->input('jumlah_itm_kg'),
        'total_harga' => $request->input('total_bayar'),
        'uang_bayar' => $request->input('uang_bayar'),
        'uang_kembali' => $request->input('uang_kembali'),
        'status' => $request->input('status'),
    ]);

    return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Transaksi::find($id);
        $produk=Produk::all();
        return view('transaksi.edit', compact('data', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'produk' => 'required:exists:produk,id',
            'jumlah_itm_kg' => 'required',
            'total_bayar' => 'required',
            'uang_bayar' => 'required',
            'uang_kembali' => 'required',
            'status' => 'required',
            'tanggal_ambil',
            ]);
    
        $transaksi = Transaksi::find($id);    
        $transaksi->update([
            'nomor_unik' => $request->input('nomor_unik'),
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'id_produk' => $request->input('produk'),
            'jumlah_itm_kg' => $request->input('jumlah_itm_kg'),
            'total_harga' => $request->input('total_bayar'),
            'uang_bayar' => $request->input('uang_bayar'),
            'uang_kembali' => $request->input('uang_kembali'),
            'status' => $request->input('status'),
            'tgl_keluar' => $request->input('tanggal_ambil'),
        ]);

        $transaksi->save();
    
        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function pdf()
    {
        $data = Transaksi::all();
        $pdf = Pdf::loadView('transaksi.pdf', compact('data'));
        return $pdf->stream();
    }
    public function byidpdf(String $id)
    {
        $p = Transaksi::find($id);
        $pdf = Pdf::loadView('transaksi.bypdf', compact('p'));
        return $pdf->stream();
    }
}
