<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>List Keterangan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')

<div class="service-list">
    <h2>Data Keterangan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kilometer</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraanList as $item)
            <tr>
                <td>{{ date('j F Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->kilometer }}</td>
                <td>{{ $item->total_harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
