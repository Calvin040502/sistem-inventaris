<table class="table table-hover text-center">
    <thead>
        <tr class="bg-info">
            <th>No.</th>
            <th>Kode</th>
            <th>Jenis Aksesoris</th>
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
        @foreach ($aksesoris as $aksesori)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $aksesori->kode }}</td>
                <td>{{ $aksesori->jenis_aksesoris }}</td>
                <td>{{ $aksesori->merek }}</td>
                <td>{{ $aksesori->tahun_perolehan }}</td>
                <td>{{ $aksesori->harga_perolehan }}</td>
                <td>{{ $aksesori->masa_guna }}</td>
                <td>{{ $aksesori->lama_pakai }}</td>
                <td>{{ $aksesori->kondisi }}</td>
                <td>{{ $aksesori->lokasi }}</td>
                <td>{{ $aksesori->pengguna }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
