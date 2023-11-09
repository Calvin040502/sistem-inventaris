<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Elektronik {{ $elektronik->merek }} {{ $elektronik->tipe }}</title>
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
                <h1>Detail {{ $elektronik->merek }} {{ $elektronik->tipe }}</h1>
            </div>
            <div class="row content-output-table">
                <div class="button-ouput">
                    <a style="width: 6rem;" class="btn btn-back" href="{{ route('elektronik') }}"
                        title="List Elektronik">Kembali</a>
                    @can('super admin')
                        <button style="width: 6rem;" type="button"
                            onclick="window.location.href='{{ route('elektronik.edit', $elektronik->id) }}'"
                            class="btn btn-edit" title="Edit Data Kendaraan">Edit</button>
                    @endcan
                </div>
                <div class="col output-column-one">
                    <div class="output">
                        <label class="label-title" for="">Kode</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->kode }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Jenis Elektronik</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->jenis_elektronik }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Merek</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->merek }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Tipe</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->tipe }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Tahun Perolehan</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->tahun_perolehan }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title" for="">Harga Perolehan</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->harga_perolehan }}</span>
                    </div>
                </div>
                <div class="col output-column-two">
                    <div class="output">
                        <label class="label-title-two" for="">Kondisi</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->kondisi }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Masa Guna</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->masa_guna }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Lama Pakai</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->lama_pakai }}</span>
                    </div>
                    <div class="output">
                        <label class="label-title-two" for="">Pengguna</label>
                        <label for="">:</label>
                        <span>{{ $elektronik->pengguna }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="spacer"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    @extends('templates.footer')
</body>
<style>       
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        flex-wrap: ;
        margin: 0;
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
        flex-wrap: wrap;
        flex-direction: column;
        text-align: left;
        margin: 0 auto;
        align-items: center;
        justify-content: center;
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
        justify-content: flex-start;
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
