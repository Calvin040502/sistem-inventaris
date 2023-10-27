<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Tambah Aset Aksesoris</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-12 title-form mt-3 mb-1" id="title-form">
                        <h1>TAMBAH AKSESORIS</h1>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ route('aksesori.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <a class="btn btn-back mb-3 shadow-sm" href="/aksesori">Kembali</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="kode">
                                        <label for="kode">Kode :</label>
                                        <input class="form-first p-1 shadow-sm bg-body-tertiary rounded" type="text" id="kode"
                                            name="kode" value="{{ $serialNumber }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="jenis_aksesoris" class="col-form-label">Jenis Aksesoris</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="jenis_aksesoris" name="jenis_aksesoris"
                                        placeholder="Masukkan Jenis Aksesoris"
                                        onkeypress="return hanyaHurufDanSpasi(event)" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="merek" class="col-form-label">Merek</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="merek" name="merek"
                                        placeholder="Masukkan Merek" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="tahun_perolehan" class="col-form-label">Tahun Perolehan</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="tahun_perolehan" name="tahun_perolehan"
                                        placeholder="Masukkan Tahun Perolehan" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="harga_perolehan" class="col-form-label">Harga Perolehan</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="harga_perolehan" name="harga_perolehan"
                                        placeholder="Masukkan Harga Perolehan" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="masa_guna" class="col-form-label"> Masa Guna </label>
                                    <input id="masa_guna" class="form-control shadow-sm bg-body-tertiary rounded" type="text" id="masa_guna"
                                        name="masa_guna" placeholder="Masukkan Masa Guna" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lama_pakai" class="col-form-label"> Lama Pakai </label>
                                    <input id="lama_pakai" class="form-control shadow-sm bg-body-tertiary rounded" type="text" id="lama_pakai"
                                        name="lama_pakai" placeholder="Masukkan Lama Pakai" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="kondisi" class="col-form-label"> Kondisi </label>
                                    <input id="kondisi" class="form-control shadow-sm bg-body-tertiary rounded" type="text" id="kondisi"
                                        name="kondisi" placeholder="Masukkan Kondisi" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lokasi" class="col-form-label"> Lokasi </label>
                                    <input id="lokasi" class="form-control shadow-sm bg-body-tertiary rounded" type="text" id="lokasi"
                                        name="lokasi" placeholder="Masukkan Lokasi" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="pengguna" class="col-form-label"> Pengguna </label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="pengguna" name="pengguna"
                                        placeholder="Masukkan Pengguna" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-add mt-3 shadow-sm">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    @extends('templates.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        function hanyaHurufDanSpasi(event) {
            var charCode = event.which || event.keyCode;

            // Mengecek apakah karakter yang dimasukkan adalah huruf atau spasi
            if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode === 32) {
                return true;
            } else {
                event.preventDefault();
                return false;
            }
        }
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
        var harga_perolehanInput = document.getElementById('harga_perolehan');

        // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
        harga_perolehanInput.addEventListener('input', function() {
            formatCurrency(this);
        });
    </script>
</body>
<style>
    body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    a:hover {
        color: #8ba8d9;
    }

    /* Content */

    .content-wrapper {
        padding: 2rem;
        flex-grow: 1;
        min-height: calc(100vh - 60px);
    }

    .wrapper {
        max-width: 960px;
        margin: 0 auto;
    }

    /* Form */

    form {
        margin-bottom: 2rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.3rem;
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

    .btn-add{
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
    }

    .btn-add:hover{
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
    }

    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }

    .kode {
        text-align: right;
    }

    .kode mb-5 {
        margin-bottom: 5rem;
    }
</style>

</html>
