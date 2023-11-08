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
            <label class="date float-end">
                {{ date('l, j F Y') }}
            </label>
        </div>
        <div class="content">
            <div class="content-title">
                <h1>DETAIL KENDARAAN</h1>
            </div>
            <div class="row content-output-table">
                <div class="button-ouput">
                    <a style="width: 6rem;" class="btn btn-back" href="{{ route('kendaraan') }}"
                        title="List Kendaraan">Kembali</a>
                    <button style="width: 6rem;" type="button"
                        onclick="window.location.href='{{ route('kendaraan.edit', $kendaraan->id) }}'"
                        class="btn btn-edit" title="Edit Data Kendaraan">Edit</button>
                </div>
                <div class="col output-column-one">
                    <div class="output">
                        <label class="label-title" for="">Kode</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->kode }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Jenis Kendaraan</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->jenis_kendaraan }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Merek Kendaraan</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->merek }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Plat Nomor</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->plat_nomor }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Tahun Perolehan</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->tahun_perolehan }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Harga Perolehan</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->harga_perolehan }}</span>
                    </div>
                </div>
                <div class="col output-column-two">
                    <div class="output">
                        <label class="label-title-two" for="">Kondisi</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->kondisi }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Masa Guna</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->masa_guna }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Masa Pajak</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->masa_pajak }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Lama Pakai</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->lama_pakai }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Pengguna</label>
                        <label for="">:</label>
                        <span>{{ $kendaraan->pengguna }}</span>
                    </div>
                </div>
            </div>
            <div class="content-output-service">
                <div class="content-title-two">
                    <h1>LIST SERVICE KENDARAAN</h1>
                </div>
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 10px"
                                    id="sortNo">Tanggal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kilometer</th>
                                <th scope="col">Total Harga</th>
                                <th style="justify-content: center; align-items: center; cursor: pointer; border-top-right-radius: 10px"
                                    id="sortNo">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keterangans->sortByDesc('tanggal') as $keterangan)
                                <tr>
                                    <td>{{ date('j F Y', strtotime($keterangan->tanggal)) }}</td>
                                    <td>{{ $keterangan->keterangan }}</td>
                                    <td>{{ $keterangan->kilometer }}</td>
                                    <td>{{ $keterangan->total_harga }}</td>
                                    <td>
                                        <a href="{{ route('kendaraan.keterangan.edit', ['kendaraan' => $kendaraan->id, 'keterangan' => $keterangan->id]) }}"
                                            class="btn btn-primary">Edit</a>


                                        <form
                                            action="{{ route('kendaraan.keterangan.destroy', ['kendaraan' => $kendaraan->id, 'keterangan' => $keterangan->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
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
    <div class="spacer"></div>


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
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        flex-wrap: wrap
    }

    .body-wrapper {
        margin: 0 2rem 0 2rem;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    .content {
        margin: 3rem 0rem 3rem 0rem;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .content-title {
        margin-bottom: 2rem;
    }

    .content-title-two {
        margin: 5rem 0 2rem 0;
        text-align: center;
    }

    .content-output-table {
        display: flex;
        text-align: left;
        width: 70%;
        margin: 0 auto;
    }

    .content-output-service {
        display: flex;
        flex-direction: column;
        text-align: left;
        margin: 0 auto;
    }

    .output-column-one {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    .output-column-two {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
    }

    .output {
        padding-left: 30%;
        margin: 4px 0 4px 0;
    }

    .label-title {
        width: 8.5rem;
        font-weight: 600;
    }

    .label-title-two {
        width: 6rem;
        font-weight: 600;
    }

    .table th,
    td {
        text-align: center;
        justify-content: center;
        align-items: center;
        vertical-align: middle;
    }

    .table th {
        background-color: #3c6687;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 4rem;
        border-bottom: 1px solid #493d3d
    }

    .table td {
        height: 4rem;
    }

    .button-ouput {
        margin: 0rem 0 1.5rem 0;
        text-align: left;
        padding-left: 15%
    }

    .date {
        margin-top: 0.6rem;
        font-weight: 600;
        font-size: 14pt
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
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

    .btn-edit {
        background-color: #d96652;
        color: #e9ecf1;
        border-radius: 0.3rem
    }

    .btn-edit:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d
    }
</style>

</html>
