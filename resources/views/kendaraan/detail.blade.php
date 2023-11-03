<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Kendaraan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    @include('templates.navbar')
    <div class="body-wrapper">
        <div class="date">
            <label class="date float-end" style="font-weight: 500">
                {{ date('l, j F Y') }}
            </label>
            <div class="content">
                <div class="content-title">
                    <h1>Detail Kendaraan</h1>
                </div>
                <div class="row content-output-table">
                    <div class="col output-column">
                        <div class="output">
                            <label for="">Kode</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->kode }}</span>
                        </div>
                        <div class="output">
                            <label for="">Jenis Kendaraan</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->jenis_kendaraan }}</span>
                        </div>
                        <div class="output">
                            <label for="">Merek Kendaraan</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->merek }}</span>
                        </div>
                        <div class="output">
                            <label for="">Plat Nomor</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->plat_nomor }}</span>
                        </div>
                        <div class="output">
                            <label for="">Tahun Perolehan</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->tahun_perolehan }}</span>
                        </div>
                        <div class="output">
                            <label for="">Harga Perolehan</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->harga_perolehan }}</span>
                        </div>
                    </div>
                    <div class="col output-column">
                        <div class="output">
                            <label for="">Kondisi</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->kondisi }}</span>
                        </div>
                        <div class="output">
                            <label for="">Masa Guna</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->masa_guna }}</span>
                        </div>
                        <div class="output">
                            <label for="">Masa Pajak</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->masa_pajak }}</span>
                        </div>
                        <div class="output">
                            <label for="">Lama Pakai</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->lama_pakai }}</span>
                        </div>
                        <div class="output">
                            <label for="">Pengguna</label>
                            <label for="">:</label>
                            <span>{{ $kendaraan->pengguna }}</span>
                        </div>
                    </div>
                    <div class="button-ouput">
                        <a style="width: 6rem;" class="btn btn-back" href="{{ route('kendaraan') }}">Kembali</a>
                        <button style="width: 6rem;" type="button"
                            onclick="window.location.href='{{ route('kendaraan.edit', $kendaraan->id) }}'"
                            class="btn btn-edit">Edit</button>
                    </div>
                </div>

                <div class="content-output-service">
                    <h1>Riwayat Service</h1>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kilometer</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keterangans as $keterangan)
                                    <tr>
                                        <td>{{ date('j F Y', strtotime($keterangan->tanggal)) }}</td>
                                        <td>{{ $keterangan->keterangan }}</td>
                                        <td>{{ $keterangan->kilometer }}</td>
                                        <td>{{ $keterangan->total_harga }}</td>
                                        <td>
                                            <button>edit</button>
                                            <button>Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('kendaraan.keterangan.create', $kendaraan->id) }}"
                            class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
        </div>

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
        var total_hargaInput = document.getElementById('total_harga');

        // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
        total_hargaInput.addEventListener('input', function() {
            formatCurrency(this);
        });
    </script>
    @extends('templates.footer')
</body>
<style>
    .date {
        margin-right: 16px;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }
</style>

</html>
