<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF BY ID</title>
</head>
<body>
    <div>
        <h1>Data Transaksi</h1>
        <p>Nomor Transaksi : {{ $p->nomor_unik }}</p>
        <p>Nama Pelanggan : {{ $p->nama_pelanggan }}</p>
        <p>Produk : {{ $p->produk->nama_produk }}</p>
    </div>
</body>
</html>