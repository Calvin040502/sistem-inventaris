<!DOCTYPE html>
<html lang="en">

<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">

</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Content goes here -->
        <div class="container" style="margin-top: 4rem">
            <div class="col">
                <h1 class="text-center" style="margin-bottom: 3rem">Dashboard</h1>
                <div class="col" style="margin-left: 32px">
                    <table class="table table-hover table-striped text-center" id="kendaraan-table"
                        style="margin-bottom: 2rem">
                        <caption class="text-center" style="caption-side: top; font-size: 1.5em; margin-bottom: 10px;">Kendaraan</caption>
                        <thead>
                            <tr class="bg-info">
                                <th style="width: 1.5rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius:6px "
                                    id="sortNo">No.</th>
                                <th style="width: 5rem">Nama Admin</th>
                                <th style="width: 3rem">Tanggal</th>
                                <th style="width: 4rem">Kode</th>
                                <th style="width: 4rem">Plat Nomor</th>
                                <th style="width: 4rem">Jenis Kendaraan</th>
                                <th style="width: 4rem">Kondisi</th>
                                <th style="width: 4rem">Masa Guna</th>
                                <th style="width: 4rem">Lama Pakai</th>
                                <th style="width: 4rem">Lokasi</th>
                                <th style="width: 4rem; border-top-right-radius: 6px">Masa Pajak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraans as $kendaraan)
                                <tr onclick="window.location.href='{{ route('kendaraan.detail', $kendaraan->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($kendaraan->user)->name }}</td>
                                    <td>{{ date('j F Y', strtotime($kendaraan->created_at)) }}</td>
                                    <td>{{ $kendaraan->kode }}</td>
                                    <td>{{ $kendaraan->plat_nomor }}</td>
                                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                    <td>{{ $kendaraan->kondisi }}</td>
                                    <td>{{ $kendaraan->masa_guna }}</td>
                                    <td>{{ $kendaraan->lama_pakai }}</td>
                                    <td>{{ $kendaraan->lokasi }}</td>
                                    <td>{{ $kendaraan->masa_pajak }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover table-striped text-center" id="elektronik-table"
                        style="margin-bottom: 2rem">
                        <caption class="text-center" style="caption-side: top; font-size: 1.5em; margin-bottom: 10px;">Elektronik</caption>
                        <thead>
                            <tr class="bg-info">
                                <th style="width: 1.5rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius:6px "
                                    id="sortNo">No.</th>
                                <th style="width: 5rem">Nama Admin</th>
                                <th style="width: 3rem">Tanggal</th>
                                <th style="width: 4rem">Kode</th>
                                <th style="width: 4rem">Jenis Elektronik</th>
                                <th style="width: 4rem">Kondisi</th>
                                <th style="width: 4rem">Masa Guna</th>
                                <th style="width: 4rem">Lama Pakai</th>
                                <th style="width: 4rem; border-top-right-radius: 6px">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elektroniks as $elektronik)
                                <tr onclick="window.location.href='{{ route('elektronik.detail', $elektronik->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($elektronik->user)->name }}</td>
                                    <td>{{ date('j F Y', strtotime($elektronik->created_at)) }}</td>
                                    <td>{{ $elektronik->kode }}</td>
                                    <td>{{ $elektronik->jenis_elektronik }}</td>
                                    <td>{{ $elektronik->kondisi }}</td>
                                    <td>{{ $elektronik->masa_guna }}</td>
                                    <td>{{ $elektronik->lama_pakai }}</td>
                                    <td>{{ $elektronik->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover table-striped text-center" id="furnitur-table"
                        style="margin-bottom: 2rem">
                        <caption class="text-center" style="caption-side: top; font-size: 1.5em; margin-bottom: 10px;">Furnitures</caption>
                        <thead>
                            <tr class="bg-info">
                                <th style="width: 1.5rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius:6px "
                                    id="sortNo">No.</th>
                                <th style="width: 5rem">Nama Admin</th>
                                <th style="width: 3rem">Tanggal</th>
                                <th style="width: 4rem">Kode</th>
                                <th style="width: 4rem">Jenis Furnitures</th>
                                <th style="width: 4rem">Kondisi</th>
                                <th style="width: 4rem">Masa Guna</th>
                                <th style="width: 4rem">Lama Pakai</th>
                                <th style="width: 4rem; border-top-right-radius: 6px">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($furniturs as $furnitur)
                                <tr onclick="window.location.href='{{ route('furnitur.detail', $furnitur->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($furnitur->user)->name }}</td>
                                    <td>{{ date('j F Y', strtotime($furnitur->created_at)) }}</td>
                                    <td>{{ $furnitur->kode }}</td>
                                    <td>{{ $furnitur->jenis_furniture }}</td>
                                    <td>{{ $furnitur->kondisi }}</td>
                                    <td>{{ $furnitur->masa_guna }}</td>
                                    <td>{{ $furnitur->lama_pakai }}</td>
                                    <td>{{ $furnitur->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover table-striped text-center" id="aksesori-table"
                        style="margin-bottom: 2rem">
                        <caption class="text-center" style="caption-side: top; font-size: 1.5em; margin-bottom: 10px;">Aksesoris</caption>
                        <thead>
                            <tr class="bg-info">
                                <th style="width: 1.5rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius:6px "
                                    id="sortNo">No.</th>
                                <th style="width: 5rem">Nama Admin</th>
                                <th style="width: 3rem">Tanggal</th>
                                <th style="width: 4rem">Kode</th>
                                <th style="width: 4rem">Jenis Aksesoris</th>
                                <th style="width: 4rem">Kondisi</th>
                                <th style="width: 4rem">Masa Guna</th>
                                <th style="width: 4rem">Lama Pakai</th>
                                <th style="width: 4rem; border-top-right-radius: 6px">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aksesoris as $aksesori)
                                <tr onclick="window.location.href='{{ route('aksesori.detail', $aksesori->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($aksesori->user)->name }}</td>
                                    <td>{{ date('j F Y', strtotime($aksesori->created_at)) }}</td>
                                    <td>{{ $aksesori->kode }}</td>
                                    <td>{{ $aksesori->jenis_aksesoris }}</td>
                                    <td>{{ $aksesori->kondisi }}</td>
                                    <td>{{ $aksesori->masa_guna }}</td>
                                    <td>{{ $aksesori->lama_pakai }}</td>
                                    <td>{{ $aksesori->lokasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @extends('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

<style>
    .date {
    margin-right: 16px;
    margin-top: 10px;
    font-size: 18px
    }
    .main-content{
        flex-grow: 1;
    min-height: calc(100vh - 60px);
    }
    .col-content {
        display: flex;
        justify-content: space-between
    }

    .table th {
        background-color: #3c6687;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 3rem;
        border-bottom: 1px solid #493d3d
    }

    .table td {
        margin: 0;
        padding: 0 4px 0 4px;
        vertical-align: middle;
        height: 6rem;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
    }

    .pagination a {
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

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: auto;
        background-color: #8ba8d9;
        padding: 10px 0
    }
</style>

</html>