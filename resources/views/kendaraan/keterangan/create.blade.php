<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Tambah Keterangan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
@include('templates.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tambah Keterangan</h1>
            <a style="width: 6rem;" class="btn btn-back" href="{{ route('kendaraan') }}">Kembali</a>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <form action="{{ route('kendaraan.keterangan.store', $keterangan) }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="spacer"></div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <div class="spacer"></div>
                <div class="form-group">
                    <label for="kilometer">Kilometer</label>
                    <input type="text" class="form-control" id="kilometer" name="kilometer">
                </div>
                <div class="spacer"></div>
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga">
                </div>
                <div class="spacer"></div>
                <div class="spacer"></div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<div class="spacer"></div>
@extends('templates.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
<script>
    // Fungsi untuk memformat input jumlah dengan titik dan "RP"
    function formatCurrency(input) {
        // Hapus semua karakter selain angka
        var value = input.value.replace(/[^0-9]/g, '');

        // Jika value adalah string kosong, set nilai input menjadi kosong juga
        if (value === '') {
            input.value = '';
        } else {
            // Ubah nilai menjadi format uang dengan titik sebagai pemisah ribuan
            value = parseInt(value, 10).toLocaleString('id-ID');

            // Tambahkan "RP" di depan nilai yang sudah diformat
            input.value = 'Rp ' + value;
        }
    }
    // Dapatkan elemen input jumlah berdasarkan ID
    var total_hargaInput = document.getElementById('total_harga');

    // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
    total_hargaInput.addEventListener('input', function() {
        formatCurrency(this);
    });
</script>

<script>
    document.getElementById('kilometer').addEventListener('input', function (e) {
        // Mengambil nilai dari input kilometer
        let input = e.target.value;

        // Menghapus semua karakter selain angka
        let numericValue = input.replace(/\D/g, '');

        // Menggunakan fungsi Number() untuk mengonversi ke angka
        let numericNumber = Number(numericValue);

        // Menggunakan fungsi toLocaleString() untuk menambahkan titik sebagai pemisah ribuan
        let formattedValue = numericNumber.toLocaleString();

        // Mengganti nilai input dengan yang sudah diformat
        e.target.value = formattedValue;
    });
</script>


</body>
<style>
    .spacer {
        margin: 20px 0;
    }
    .btn-back {
        background-color: #82bcde;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-back:hover {
        background-color: #5a8db6;
        color: #ffffff;
        border: 1px solid #82bcde;
    }
</style>