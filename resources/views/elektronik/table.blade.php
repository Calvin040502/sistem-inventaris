<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No.</th>
            <th>Kode</th>
            <th>Tipe</th>
            <th>Jenis Kendaraan</th>
            <th>Merek</th>
            <th>Tahun Perolehan</th>
            <th>Harga Perolehan</th>
            <th>Masa Guna</th>
            <th>Lama Pakai</th>
            <th>Kondisi</th>
            <th>Lokasi</th>
            <th>Pengguna</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($elektroniks as $elektronik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $elektronik->kode }}</td>
                <td>{{ $elektronik->tipe }}</td>
                <td>{{ $elektronik->jenis_elektronik }}</td>
                <td>{{ $elektronik->merek }}</td>
                <td>{{ $elektronik->tahun_perolehan }}</td>
                <td>{{ $elektronik->harga_perolehan }}</td>
                <td>{{ $elektronik->masa_guna }}</td>
                <td>{{ $elektronik->lama_pakai }}</td>
                <td>{{ $elektronik->kondisi }}</td>
                <td>{{ $elektronik->lokasi }}</td>
                <td>{{ $elektronik->pengguna }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
