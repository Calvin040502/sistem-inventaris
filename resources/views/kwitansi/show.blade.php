    <head>
        <title>Kwitansi</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
        @media print {
            @page {
                size: legal;
                margin-top: 0;
                margin-bottom: 0;
                margin-left: 0;
                margin-right: 0;
            }

            .sheet.wrapper:not(:first-of-type) {
                display: none;
            }

            .button.wrapper * {
                display: none;
            }
        }
    </style>

    <script>
        function printKwitansi() {
            window.print({
                mode: 'portrait'
            });
        }
    </script>

    <body>
        <div class="sheet wrapper"
            style="position: relative; display: flex; padding: 0; flex-direction: column; justify-content: center; align-items: center;">
            <div class="content wrapper"
                style="width: 21.59cm; height: 11.7cm; padding: 0 24px 0px 24px; border-bottom: 1px solid;">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0 8" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 4.5rem">Discount</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->discount }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin-left: 12">
                        <label style="width: 8.3rem">Jumlah</label>
                        <label>:</label>
                        <label style="margin: 0 4 0 6">Rp.</label>
                        <label style="width: 10rem">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right;">
                            <label style="width: 15rem; margin-right: 8;" for="date">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="width: 300; float: right; margin-right: 12">
                        <div class="row" style="margin-top: 4px; padding: 0 8">
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0 8">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 5rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 5rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 5rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content wrapper"
                style="width: 21.59cm; height: 11.7cm; padding: 0 24px 0px 24px; border-bottom: 1px solid;">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0 8" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 4.5rem">Discount</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->discount }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin-left: 12">
                        <label style="width: 8.3rem">Jumlah</label>
                        <label>:</label>
                        <label style="margin: 0 4 0 6">Rp.</label>
                        <label style="width: 10rem">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right;">
                            <label style="width: 15rem; margin-right: 8;" for="date">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="width: 300; float: right; margin-right: 12">
                        <div class="row" style="margin-top: 4px; padding: 0 8">
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0 8">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 5rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 5rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 5rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content wrapper" style="width: 21.59cm; height: 11.7cm; padding: 0 24px 0px 24px;">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0 8" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin-left: 12">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 4.5rem">Discount</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->discount }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin-left: 12">
                        <label style="width: 8.3rem">Jumlah</label>
                        <label>:</label>
                        <label style="margin: 0 4 0 6">Rp.</label>
                        <label style="width: 10rem">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right;">
                            <label style="width: 15rem; margin-right: 8;" for="date">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="width: 300; float: right; margin-right: 12">
                        <div class="row" style="margin-top: 4px; padding: 0 8">
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center" style="border-top: 1px solid; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0 8">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 5rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 5rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 5rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button wrapper"
            style="padding: 32; position: relative; flex-direction: row; display: flex; justify-content: center; align-items: center">
            <div style="width: 21.59cm; text-align: center">
                <a class="btn btn-primary" href="/kwitansi">Kembali</a>
                <button type="button" href="{{ route('kwitansi.edit', $kwitansi->id) }}"
                    class="btn btn-warning">Edit</button>
                <button type="button" class="btn btn-primary" onclick="printKwitansi()"
                    media="print">Cetak</button>
            </div>
        </div>
    </body>
