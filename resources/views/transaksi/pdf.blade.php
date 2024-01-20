<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi | PDF</title>
</head>

<body>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Jumlah Item/Kg </th>
                <th>Total</th>
                <th>Uang Bayar</th>
                <th>Uang Kembali</th>
                <th>Status</th>
                <th>Tanggal Terima</th>
                <th>Tanggal Ambil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nomor_unik }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->produk->nama_produk }}</td>
                <td>{{ $p->produk->kategori->nama_kategori }}</td>
                <td>{{ $p->jumlah_itm_kg }}</td>
                <td>{{ $p->total_harga }}</td>
                <td>{{ $p->uang_bayar }}</td>
                <td>{{ $p->uang_kembali }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->tgl_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
