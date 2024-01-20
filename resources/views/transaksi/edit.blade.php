@extends('layouts.app')
@section('contents')
<form action="{{ route('transaksi.update', $data->id) }}" method="POST" class="mb-3">
    @csrf
    @method('PUT')
            <div class="form-group">
                <label for="nomor_unik">Nomor Unik</label>
                <input type="number" class="form-control" name="nomor_unik" aria-describedby="emailHelp" value="{{ random_int(1000000000, 9999999999) }}" value="{{ $data->nomor_unik }}" readonly>
            </div>

            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" value="{{ $data->nama_pelanggan }}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <select name="produk" id="produk" class="form-control">
                    @foreach ($produk as $p)
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga_produk }}" {{ $p->id == $data->produk_id ? 'selected' : '' }}>
                            {{ $p->nama_produk }} - Rp.{{ $p->harga_produk }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="jumlah_itm_kg">Jumlah Item (Kg)/1 Item</label>
                <input type="number" class="form-control" value="{{ $data->jumlah_itm_kg }}" id="jumlah_itm_kg" name="jumlah_itm_kg" oninput="hitungTotalBayar()">
            </div>

            <div class="form-group">
                <label for="total_bayar">Total Bayar</label>
                <input type="number" class="form-control" id="total_bayar" name="total_bayar" value="{{ $data->total_harga }}" readonly>
            </div>

            <div class="form-group">
                <label for="uang_bayar">Uang Bayar</label>
                <input type="text" name="uang_bayar" id="uang_bayar" value="{{ $data->uang_bayar }}" class="form-control" required oninput="hitungUangKembali()">
            </div>

            <div class="form-group">
                <label for="uang_kembali">Uang Kembali</label>
                <input type="number" name="uang_kembali" id="uang_kembali" value="{{ $data->uang_kembali }}" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_ambil">Tanggal Ambil</label>
                <input type="date" name="tanggal_ambil" id="tanggal_ambil" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Diambil</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <script>
            function hitungTotalBayar() {
                var hargaProduk = document.getElementById('produk').options[document.getElementById('produk').selectedIndex].getAttribute('data-harga');
                var jumlahItem = document.getElementById('jumlah_itm_kg').value;
                
                var totalBayar = hargaProduk * jumlahItem;
        
                document.getElementById('total_bayar').value = totalBayar;

                hitungUangKembali();
            }

            function hitungUangKembali() {
                var totalBayar = parseFloat(document.getElementById('total_bayar').value);
                var uangBayar = parseFloat(document.getElementById('uang_bayar').value);

                var uangKembali = uangBayar - totalBayar;

                document.getElementById('uang_kembali').value = uangKembali;
            }
        </script>
@endsection
