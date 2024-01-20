@extends('layouts.app')
@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Data Transaksi</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <a href="{{ route('transaksi.tambah') }}" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
            <a href="{{ route('transaksi.pdf') }}" target="_blank" class="btn btn-primary mb-3">
                <i class="fa fa-print"></i> Print Laporan
            </a>
        </div>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="table table-bordered dataTable table-bordered custom-table" >
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Nomor Transaksi</th>
                                            <th class="text-center align-middle">Nama Pelanggan</th>
                                            <th class="text-center align-middle">Nama Produk</th>
                                            <th class="text-center align-middle">Kategori Produk</th>
                                            <th class="text-center align-middle">Jumlah Item/Kg </th>
                                            <th class="text-center align-middle">Total</th>
                                            <th class="text-center align-middle">Uang Bayar</th>
                                            <th class="text-center align-middle">Uang Kembali</th>
                                            <th class="text-center align-middle">Status</th>
                                            <th class="text-center align-middle">Tanggal Terima</th>
                                            <th class="text-center align-middle">Tanggal Ambil</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $p->nomor_unik }}</td>
                                            <td class="text-center">{{ $p->nama_pelanggan }}</td>
                                            <td class="text-center">{{ $p->produk->nama_produk }}</td>
                                            <td class="text-center">{{ $p->produk->kategori->nama_kategori }}</td>
                                            <td class="text-center">{{ $p->jumlah_itm_kg }}</td>
                                            <td class="text-center">{{ $p->total_harga }}</td>
                                            <td class="text-center">{{ $p->uang_bayar }}</td>
                                            <td class="text-center">{{ $p->uang_kembali }}</td>
                                            <td class="text-center">{{ $p->status }}</td>
                                            <td class="text-center">{{ $p->created_at }}</td>
                                            <td class="text-center">{{ $p->tgl_keluar }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('transaksi.edit', $p->id) }}" class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('transaksi.byidpdf', $p->id) }}" target="_blank" class="btn btn-primary mr-2">
                                                        <i class="fas fa-print fa-sm"></i>
                                                    </a>
                                                    <form action="{{ route('transaksi.destroy', $p->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            <i class="fas fa-trash-alt fa-sm"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                    </div></div>

        </div>
    </div>
</div>
@endsection
