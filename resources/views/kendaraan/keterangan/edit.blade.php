<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Keterangan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Keterangan</div>
                    <a style="width: 6rem;" class="btn btn-back" href="{{ route('kendaraan') }}">Kembali</a>

                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('kendaraan.keterangan.update', ['kendaraan' => $kendaraan->id, 'keterangan' => $keterangan->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $keterangan->tanggal }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="{{ $keterangan->keterangan }}">
                            </div>

                            <div class="form-group">
                                <label for="kilometer">Kilometer</label>
                                <input type="text" class="form-control" id="kilometer" name="kilometer"
                                    value="{{ $keterangan->kilometer }}">
                            </div>

                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga"
                                    value="{{ $keterangan->total_harga }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>

<style>
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

</html>
