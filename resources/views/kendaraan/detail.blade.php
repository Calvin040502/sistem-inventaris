<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Kendaraan</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        /* Center the service form */
        .service-form {
            margin: 0 auto;
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style the form fields */
        .service-form .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('templates.navbar')
    <div class="container">
        <div class="content">
            <h1 class="text-center">Detail Kendaraan</h1>
            <div class="output-columns">
                <div class="column-left">
                    <div class="kode">
                        <label class="no">Kode:</label>
                        <span>{{ $kendaraan->kode }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Jenis Kendaraan:</label>
                        <span>{{ $kendaraan->jenis_kendaraan }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Merek:</label>
                        <span>{{ $kendaraan->merek }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Tahun Perolehan:</label>
                        <span>{{ $kendaraan->tahun_perolehan }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Harga Perolehan:</label>
                        <span>{{ $kendaraan->harga_perolehan }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Masa Guna:</label>
                        <span>{{ $kendaraan->masa_guna }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Lama Pakai:</label>
                        <span>{{ $kendaraan->lama_pakai }}</span>
                    </div>
                </div>
                <div class="column-right">
                    <div class="output">
                        <label>Kondisi:</label>
                        <span>{{ $kendaraan->kondisi }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Lokasi:</label>
                        <span>{{ $kendaraan->lokasi }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Pengguna:</label>
                        <span>{{ $kendaraan->pengguna }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Masa Pajak:</label>
                        <span>{{ $kendaraan->masa_pajak }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Tanggal Servis:</label>
                        <span>{{ date('j F Y', strtotime($kendaraan->service_date)) }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Jenis Servis:</label>
                        <span>{{ $kendaraan->service_type }}</span>
                    </div>
                    <div class="spacer"></div>
                    <div class="output">
                        <label>Tanggal Ganti Oli:</label>
                        <span>{{ date('j F Y', strtotime($kendaraan->oil_change_date)) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    <div class="service-form">
        <h2>Isi Informasi Servis & Ganti Oli</h2>
        <form id="service-details-form" action="{{ route('kendaraan.updateService', $kendaraan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="service-date">Tanggal Servis:</label>
                <input type="date" name="service_date" id="service-date">
            </div>
            <div class="form-group">
                <label for="service-type">Jenis Servis:</label>
                <input type="text" name="service_type" id="service-type">
            </div>
            <div class="form-group">
                <label for="oil-change-date">Tanggal Ganti Oli:</label>
                <input type="date" name="oil_change_date" id="oil-change-date">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<div class="spacer"></div>
        <div class="button-wrapper" style="padding: 32px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex: 6;">
                <a style="width: 6rem;" class="btn btn-back" href="{{ route('kendaraan') }}">Kembali</a>
            </div>
            @can('super admin')
            <div style="flex: 0;">
                <button style="width: 6rem;" type="button" onclick="window.location.href='{{ route('kendaraan.edit', $kendaraan->id) }}'" class="btn btn-edit">Edit</button>
            </div>
            @endcan
        </div>
    </div>
    <div class="footer">
    @include('templates.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
<style>

    .spacer {
        margin: 20px 0;
    }
    .container {
        display: flex;
        flex-direction: column;
    }
    
    .output-columns {
        display: flex;
        justify-content: space-between;
    }
    
    .column-left {
        flex: 0.6;
    }
    
    .column-right {
        flex: 0.2;
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

    .btn-print {
        background-color: #f9d150;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-print:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761
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
