    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Aset Kendaraan</title>
        <link rel="icon" href="{{ asset('img/logoremove.png') }}">
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
        @media print {
            @page {
                size: 21cm 33cm;
                margin: 11pt 0px 0px 0px;
            }

            .button.wrapper * {
                display: none;
                visibility: none;
            }

            .sheet.wrapper {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

        }
    </style>

    <script>
        function printKendaraan() {
            window.print({
                mode: 'portrait'
            });
        }
    </script>

    <body>
        <div class="sheet wrapper"
            style="position: relative; display: flex; padding: 0; flex-direction: column; justify-content: center; align-items: center;">
            <div class="content wrapper"
                style="background-image: url('/img/kasir.png'); width: 21.59cm; height: 10.9cm; padding: 3pt 24px 0px 24px; border-bottom: 1px solid; border-bottom-style: dashed">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output" style="text-align: right">
                        <div class="kode" style="margin: 0px 8px 0 0" id="kode">
                            <label class="no" style="margin-right: 2px">Kode:</label>
                            <label style="width: 4.5rem">{{ $kendaraan->kode }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem">Jenis Kendaraan</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kendaraan->jenis_kendaraan }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem">Merek</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kendaraan->merek }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Tahun Perolehan</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kendaraan->tahun_perolehan }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Harga Perolehan</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kendaraan->harga_perolehan }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Masa Guna</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kendaraan->masa_guna }}</label>
                    </div>
                    <div class="wrapper output radio" style="display: flex; margin: 0 0 -2px 12px">
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 8rem;">Lama Pakai</label>
                            <label style="margin-left:">:</label>
                            <label style="margin-left: 0.2rem; width: 15rem;">{{ $kendaraan->lama_pakai }}</label>
                        </div>
                    </div>
                    <div class="wrapper output radio" style="display: flex; margin: 0 0 -2px 12px">
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 8rem">Kondisi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 15rem">{{ $kendaraan->kondisi }}</label>
                        </div>
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 5.3rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kendaraan->lokasi }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12px">
                        <div class="output">
                            <label style="width: 8rem">Pengguna</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kendaraan->pengguna }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin: 0 0 -1px 12px">
                        <label style="width: 8.3rem; margin: 0 0 -1px 0">Masa Pajak</label>
                        <label style="margin: 0 0 -1px 0">:</label>
                        <label style="width: 10rem; margin: 0 0 -1px 6px">{{ $kendaraan->masa_pajak }}</label>
                        <div style="flex-grow: 1; text-align: right; margin: 0 0 -1px 0 ">
                            <label style="width: 15rem; margin-right: 8px;">Cirebon,
                                {{ date('j F Y', strtotime($kendaraan->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="float: right; margin-right:8px">
                        <div class="row" style="margin-top: 4px; padding: 0 8px 0 0">
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; width: 6rem; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 8px 0px 0px;">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 4.6rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button wrapper"
            style="padding: 32px; position: relative; flex-direction: row; display: flex; justify-content: center; align-items: center">
            <div
                style="width: 21.59cm; text-align: center; display: flex; justify-content: space-between; align-items: center">
                <div style="flex: 1">
                    <a style="width: 6rem" class="btn btn-back"
                        href="{{ route('kendaraan.detail', $kendaraan->id) }}">Kembali</a>
                </div>
                <div style="flex: 1">
                    <button type="button" style="width: 6rem;" class="btn btn-print"
                        onclick="printKendaraan()" media="print">Print</button>
                </div>
            </div>
        </div>
    </body>

    </html>
    <style>
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
