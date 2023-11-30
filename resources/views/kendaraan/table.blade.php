<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No.</th>
            <th>Kode</th>
            <th>Plat Nomor</th>
            <th>Jenis Kendaraan</th>
            <th>Merek</th>
            <th>Tahun Perolehan</th>
            <th>Harga Perolehan</th>
            <th>Masa Guna</th>
            <th>Lama Pakai</th>
            <th>Kondisi</th>
            <th>Lokasi</th>
            <th>Pengguna</th>
            <th>Masa Pajak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kendaraans as $kendaraan)
            <tr>
                <td>{{ $loop->iteration }}</td>
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
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Kode Kendaraan</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Kilometer</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kendaraans as $kendaraan)
            @foreach ($kendaraan->keterangans->sortByDesc('tanggal') as $keterangan)
                <tr>
                    <td>{{ $kendaraan->kode }}</td>
                    <td>{{ date('j F Y', strtotime($keterangan->tanggal)) }}</td>
                    <td>{{ $keterangan->keterangan }}</td>
                    <td>{{ $keterangan->kilometer }}</td>
                    <td>{{ $keterangan->total_harga }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
