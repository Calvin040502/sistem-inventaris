<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No.</th>
            <th>Kode</th>
            <th>Jenis Furniture</th>
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
        @foreach ($furniturs as $furnitur)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $furnitur->kode }}</td>
                <td>{{ $furnitur->jenis_furniture }}</td>
                <td>{{ $furnitur->merek }}</td>
                <td>{{ $furnitur->tahun_perolehan }}</td>
                <td>{{ $furnitur->harga_perolehan }}</td>
                <td>{{ $furnitur->masa_guna }}</td>
                <td>{{ $furnitur->lama_pakai }}</td>
                <td>{{ $furnitur->kondisi }}</td>
                <td>{{ $furnitur->lokasi }}</td>
                <td>{{ $furnitur->pengguna }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
