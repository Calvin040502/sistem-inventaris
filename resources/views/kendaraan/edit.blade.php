<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Aset Kendaraan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem; max-width: 1200px; margin: 0 auto;">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-form mt-3 mb-4" id="title-form">
                            <h1 class="h2">EDIT KWITANSI</h1>
                        </div>
                        <form method="POST" action="{{ route('kendaraan.update', $kendaraan->id) }}" class="mb-3">
                            @method('put')
                            @csrf
                            <a class="btn btn-back mb-3" href="/kendaraan">Kembali</a>
                            <div class="mb-3">
                                <label for="kode">Kode :</label>
                                <input type="text"
                                    class="form-control shadow-sm bg-body-tertiary rounded @error('kode') is-invalid @enderror"
                                    id="kode" name="kode" readonly
                                    value="{{ old('kode', $kendaraan->kode) }}">
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('jenis_kendaraan') is-invalid @enderror"
                                        id="jenis_kendaraan" name="jenis_kendaraan"
                                        value="{{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) }}">
                                    @error('jenis_kendaraan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="merek">Merek</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('merek') is-invalid @enderror"
                                        id="merek" name="merek"
                                        value="{{ old('merek', $kendaraan->merek) }}">
                                    @error('merek')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tahun_perolehan">Tahun Perolehan</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('tahun_perolehan') is-invalid @enderror"
                                        id="tahun_perolehan" name="tahun_perolehan" value="{{ old('tahun_perolehan', $kendaraan->tahun_perolehan) }}">
                                    @error('tahun_perolehan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="harga_perolehan">Harga Perolehan</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('harga_perolehan') is-invalid @enderror"
                                        id="harga_perolehan" name="harga_perolehan"
                                        value="{{ old('harga_perolehan', $kendaraan->harga_perolehan) }}">
                                    @error('harga_perolehan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="masa_guna">Masa Guna</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('masa_guna') is-invalid @enderror"
                                        id="masa_guna" name="masa_guna"
                                        value="{{ old('masa_guna', $kendaraan->masa_guna) }}">
                                    @error('masa_guna')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lama_pakai">Lama Pakai</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('masa_guna') is-invalid @enderror"
                                        id="lama_pakai" name="lama_pakai"
                                        value="{{ old('lama_pakai', $kendaraan->lama_pakai) }}">
                                    @error('lama_pakai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kondisi">Kondisi</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('kondisi') is-invalid @enderror"
                                        id="kondisi" name="kondisi"
                                        value="{{ old('kondisi', $kendaraan->kondisi) }}">
                                    @error('kondisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('masa_guna') is-invalid @enderror"
                                        id="lokasi" name="lokasi"
                                        value="{{ old('lokasi', $kendaraan->lokasi) }}">
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pengguna">Pengguna</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('pengguna') is-invalid @enderror"
                                        id="pengguna" name="pengguna"
                                        onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('pengguna', $kendaraan->pengguna) }}">
                                    @error('pengguna')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ganti_oli">Tanggal Ganti Oli</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('masa_guna') is-invalid @enderror"
                                        id="ganti_oli" name="ganti_oli"
                                        value="{{ old('ganti_oli', $kendaraan->ganti_oli) }}">
                                    @error('ganti_oli')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3 mt-3">
                                <div class="col-md-12">
                                    <label for="service">Tanggal Service</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('service') is-invalid @enderror"
                                        id="service" name="service"
                                        value="{{ old('service', $kendaraan->service) }}">
                                    @error('service')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="masa_pajak">Masa Pajak</label>
                                <input type="text"
                                    class="form-control shadow-sm bg-body-tertiary rounded @error('masa_pajak') is-invalid @enderror"
                                    id="masa_pajak" name="masa_pajak" value="{{ old('masa_pajak', $kendaraan->masa_pajak) }}">
                                @error('masa_pajak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-add shadow-sm">Simpan
                                Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
        var harga_perolehanInput = document.getElementById('harga_perolehan');

        // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
        harga_perolehanInput.addEventListener('input', function() {
            formatCurrency(this);
        });
    </script>

    <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
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
    <footer>
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2023 Copyright:
            <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek
                Group</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
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
        border-radius: 0.25rem;
    }

    .btn-add {
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
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

    footer {
        padding: 1rem;
        background-color: #8ba8d9;
        color: #fff;
        text-align: center;
    }

    footer a {
        color: #fff;
        text-decoration: none;
    }

    footer a:hover {
        color: #ccc;
    }

    /* Custom */

    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }
</style>
