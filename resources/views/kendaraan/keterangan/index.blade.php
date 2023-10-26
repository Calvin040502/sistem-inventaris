<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Keterangan Aset Kendaraan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    @include('templates.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List Keterangan</h1>
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
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('kendaraan.keterangan.create', $keterangan) }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- @extends('templates.footer') --}}
</body>
