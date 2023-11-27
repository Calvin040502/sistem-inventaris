<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Aset Kendaraan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<script>
    // Function to print the list of Kendaraan
    function printKendaraanList() {
        var printContents = document.querySelector('.kendaraan').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>

    <section class="kendaraan" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('kendaraan') }}" class="text-decoration-none"
                style="color: black">List Aset Kendaraan</a>
        </h1>

        <div class="input" style="padding-top: 2rem;">
            <div class="d-flex justify-content-end mb-3">
                <form action="/kendaraan" method="GET" class="me-2">
                    <div class="input-group">
                        <input type="search" class="form-control shadow-sm bg-body-tertiary"
                            placeholder="Cari data kendaraan..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary shadow-sm" type="submit"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0" title="Search Data">
                                <img src="{{ asset('icon/search.svg') }}" alt="">
                            </button>
                        </div>
                    </div>
                </form>
                <div class="btn-group me-2">
                    <a href="{{ route('kendaraan.create') }}" class="btn btn-add shadow-sm" title="Tambah Kendaraan">
                        <img class="add" src="{{ asset('icon/add_notes.svg') }}" alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <a href="#" class="btn btn-refresh shadow-sm" id="refreshButton" title="Refresh Data">
                        <img style="width: 20px; height: 20px;" class="refresh" src="{{ asset('icon/refresh.svg') }}"
                            alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <button class="btn btn-print shadow-sm" onclick="printKendaraanList()" title="Print Data"><img
                            src="{{ asset('icon/printer.svg') }}" alt=""></button>
                </div>
            </div>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kendaraan-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 10px"
                            id="sortNo">No.</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortKode">Kode</th>
                        <th style="width: 6rem;">Plat Nomor</th>
                        <th style="width: 6rem;">Jenis Kendaraan</th>
                        <th style="width: 5rem;">Merk</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortTahun">Tahun Perolehan</th>
                        <th style="width: 8.5rem;">Harga Perolehan</th>
                        <th style="width: 4rem;">Masa Guna</th>
                        <th style="width: 4rem;">Lama Pakai</th>
                        <th style="width: 1rem;">Kondisi</th>
                        <th style="width: 1rem;">Lokasi</th>
                        <th style="width: 1rem;">Pengguna</th>
                        <th
                            style="width: 5rem; @cannot('super admin')
                        border-top-right-radius: 6px                            
                        @endcannot">
                            Masa Pajak</th>
                        @can('super admin')
                            <th style="width: 6.7rem; border-top-right-radius: 10px"> Action</th>
                        @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kendaraans as $kendaraan)
                        <tr onclick="window.location.href='{{ route('kendaraan.detail', ['kendaraan' => $kendaraan->id]) }}';"
                            style="cursor: pointer;">
                            <td>{{ $kendaraans->firstItem() + $loop->index }}</td>
                            <td>{{ $kendaraan->kode }}</td>
                            <td>{{ $kendaraan->plat_nomor }}</td>
                            <td>{{ $kendaraan->jenis_kendaraan }}</td>
                            <td>{{ $kendaraan->merek }}</td>
                            <td>{{ $kendaraan->tahun_perolehan }}</td>
                            <td>{{ $kendaraan->harga_perolehan }}</td>
                            <td>{{ $kendaraan->masa_guna }}</td>
                            <td>{{ $kendaraan->lama_pakai }}</td>
                            <td>{{ $kendaraan->kondisi }}</td>
                            <td>{{ $kendaraan->lokasi }}</td>
                            <td>{{ $kendaraan->pengguna }}</td>
                            <td>{{ $kendaraan->masa_pajak }}</td>
                            @can('super admin')
                                <td
                                    style="padding-left: 1rem; display: flex; height: 9rem; justify-content: space-around; align-items: center">
                                    <a class="btn btn-edit-pencil" href="{{ route('kendaraan.edit', $kendaraan->id) }}">
                                        <img src="{{ asset('icon/pen2.svg') }}" alt=""
                                            style="margin: 4px 0 4px 0">
                                    </a>

                                    <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}}}" method="POST"
                                        class="d-inline-grid">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-delete" onclick="return confirm('Are you sure?')"
                                            style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%;">
                                            <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kendaraans->appends(request()->except('kendaraan_page'))->links() }}
            {{-- <div class="pagination" style="display: flex"> --}}
        </div>
        </div>
    </section>
    @extends('kendaraan.pop-up.date-picker')
    @extends('kendaraan.pop-up.filter-date-picker')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //JS Refresh
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refreshButton');

            refreshButton.addEventListener('click', function() {
                // Lakukan operasi atau pengiriman data ke server sesuai dengan kebutuhan Anda untuk me-refresh data.
                // Misalnya, Anda bisa membuat permintaan AJAX ke server untuk memuat ulang data.

                // Setelah memuat ulang data, Anda dapat mereload halaman untuk menampilkan perubahan.
                location.reload();
            });
        });
    </script>
    @extends('templates.footer')
</body>
<style>
    /* CSS untuk elemen cetak */
    @media print {
        body * {
            visibility: hidden;
        }

        .kendaraan,
        .kendaraan * {
            visibility: visible;
        }

        .kendaraan {
            position: absolute;
            left: 0;
            top: 0;
        }

        .button.wrapper * {
            display: none;
            visibility: none;
        }
    }
</style>

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

    .kendaraan {
        flex-grow: 1;
        min-height: calc(100vh - 60px);
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
        margin: 0;
        padding: 0 4px 0 4px;
        vertical-align: middle;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 1rem 0 3rem 0;
    }

    .pagination a, .pagination .active {
        margin: 0 0.5rem;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border: 1px solid #4caf50;
        color: #4caf50;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #6ac063;
        color: white;
    }

    .pagination .active {
        background-color: #6ac063;
        color: white;
    }


    img {
        height: 26px;
        width: 26indepx;
        margin: 4px;
        padding: 0;
    }

    .date {
        font-size: 18px;
        margin-top: 10px;
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

    .btn-filter {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-filter:hover img.filter {
        content: url('icon/filterhover.svg');
    }

    .btn-refresh {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-refresh:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-refresh:hover img.refresh {
        content: url('icon/refresh-hover.svg');
    }

    .btn-print {
        background-color: #ffef0f;
        color: #404567;
        border-radius: 0.3rem;
        align-items: center;
        justify-content: center;

    }

    .btn-print:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761
    }

    .btn-edit-pencil {
        background-color: #d96652;
        color: #e9ecf1;
        border-radius: 100%;
    }

    .btn-edit-pencil:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d
    }

    .btn-delete {
        background-color: #33434f;
        color: #ffffff;
        border-radius: 0.3rem
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f
    }
</style>

</html>
