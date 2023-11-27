<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Aset Aksesoris</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<script>
    // Function to print the list of Aksesori
    function printAksesoriList() {
        var printContents = document.querySelector('.aksesori').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <section class="aksesori" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('aksesori') }}" class="text-decoration-none"
                style="color: black">List Aset Aksesoris</a>
        </h1>

        <div class="input" style="padding-top: 2rem;">
            <div class="d-flex justify-content-end mb-3">
                <form action="/aksesori" method="GET" class="me-2">
                    <div class="input-group">
                        <input type="search" class="form-control shadow-sm bg-body-tertiary"
                            placeholder="Cari data aksesoris..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary shadow-sm" type="submit"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0" title="Search Data">
                                <img src="{{ asset('icon/search.svg') }}" alt="">
                            </button>
                        </div>
                    </div>
                </form>
                <div class="btn-group me-2">
                    <a href="{{ route('aksesori.create') }}" class="btn btn-add shadow-sm" title="Tambah Aksesoris">
                        <img class="add" src="{{ asset('icon/add_notes.svg') }}" alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <a href="#" class="btn btn-refresh shadow-sm" id="refreshButton" title="Refresh Data">
                        <img style="width: 20px; height: 20px;" class="refresh" src="{{ asset('icon/refresh.svg') }}"
                            alt="">
                    </a>
                </div>
                <div class="btn-group me-2">
                    <button class="btn btn-print shadow-sm" onclick="printAksesoriList()" title="Print Data"><img
                            src="{{ asset('icon/printer.svg') }}" alt=""></button>
                </div>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-print shadow-sm" href="{{ url('aksesori/export/excel') }}"
                        title="Export Data">
                        <img src="{{ asset('icon/export_notes.svg') }}" alt="">
                    </button>
                </div>
            </div>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="aksesori-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 6px"
                            id="sortNo">No.</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortKode">Kode</th>
                        <th style="width: 6rem;">Jenis Aksesoris</th>
                        <th style="width: 5rem;">Merk</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortTahun">Tahun Perolehan</th>
                        <th style="width: 8.5rem;">Harga Perolehan</th>
                        <th style="width: 4rem;">Masa Guna</th>
                        <th style="width: 4rem;">Lama Pakai</th>
                        <th style="width: 2rem;">Kondisi</th>
                        <th style="width: 3rem;">Lokasi</th>
                        <th style="width: 3rem;">Pengguna</th>
                        @can('super admin')
                            <th style="width: 6.7rem; border-top-right-radius: 6px">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aksesoris as $aksesori)
                        <tr onclick="window.location.href='{{ route('aksesori.detail', ['aksesori' => $aksesori->id]) }}';"
                            style="cursor: pointer;">
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
                            @can('super admin')
                                <td style="display: flex; justify-content: space-around; align-items: center">
                                    <a class="btn btn-edit-pencil" href="{{ route('aksesori.edit', $aksesori->id) }}">
                                        <img src="{{ asset('icon/pen2.svg') }}" alt="" style="margin: 4px 0 4px 0">
                                    </a>

                                    <form action="{{ route('aksesori.destroy', $aksesori->id) }}" method="POST"
                                        class="d-inline-grid">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-delete" onclick="return confirm('Are you sure?')"
                                            style="margin: 0; padding: 6.5px 8px 6.5px 8px; border-radius: 100%;">
                                            <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination" style="display: flex">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //JS Refresh
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refreshButton');

            refreshButton.addEventListener('click', function() {
                // Lakukan operasi atau pengiriman data ke server sesuai dengan kebutuhan Anda untuk me-refresh data.
                // Misalnya, Anda bisa membuat permintaan AJAX ke server untuk memuat ulang data.

                // Setelah memuat ulang data, Anda dapat mereload halaman untuk menampilkan perubahan.
                location.reload();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize sorting order for each column
            let noSortOrder = 1;
            let kodeSortOrder = 1;
            let tahun_perolehanSortOrder = 1;

            // Get the table element
            const table = $("#aksesori-table");

            // Get the pagination element
            const pagination = $(".pagination");

            // Set the number of items per page
            const itemsPerPage = 10; // Ganti dengan 10 untuk menampilkan 10 data per halaman

            // Function to update the entire table with sorted data
            function updateTable(sortKey, sortOrder) {
                const $table = $("table tbody");
                const $rows = $table.find("tr").get();

                $rows.sort(function(a, b) {
                    const aValue = $(a).find("td").eq(sortKey).text();
                    const bValue = $(b).find("td").eq(sortKey).text();

                    if (sortKey === 1) {

                        return sortOrder * aValue.localeCompare(bValue);
                    } else if (sortKey === 3) {

                        return sortOrder * aValue.localeCompare(bValue);
                    } else {

                        return sortOrder * (parseFloat(aValue) - parseFloat(bValue));
                    }
                });

                $table.empty().append($rows);

                // Call the initial sorting to sort the data based on the default column
                updateTableRows(currentPage);
            }

            // Function to hide and show rows based on the current page
            function updateTableRows(currentPage) {
                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                const startIdx = (currentPage - 1) * itemsPerPage;
                const endIdx = startIdx + itemsPerPage;
                table.find("tr").slice(startIdx, endIdx).show();
            }

            // **Add the header to the table**
            table.append(table.find("thead"));

            // Handle click event for sorting by No
            $("#sortNo").click(function() {
                noSortOrder *= -1;
                updateTable(0, noSortOrder);
            });

            // Handle click event for sorting by No. Kwitansi
            $("#sortKode").click(function() {
                kodeSortOrder *= -1;
                updateTable(1, kodeSortOrder);
            });

            // Handle click event for sorting by Nama Lengkap
            $("#sortTahun").click(function() {
                tahun_perolehanSortOrder *= -1;
                updateTable(4, tahun_perolehanSortOrder);
            });

            // Set the initial page number
            let currentPage = 1;

            // Calculate the total number of pages
            const totalData = {{ $aksesoris->count() }}; // Ganti dengan jumlah data yang sesungguhnya
            const totalPages = Math.ceil(totalData / itemsPerPage);

            // Generate initial pagination buttons
            for (let i = 1; i <= totalPages; i++) {
                pagination.append(`<a href="#" class="${i === 1 ? 'active' : ''}">${i}</a>`);
            }

            // Handle click event for pagination buttons
            pagination.on("click", "a", function() {
                // Get the clicked page number
                const newPage = parseInt($(this).text());

                // If the clicked page number is different from the current page number
                if (newPage !== currentPage) {
                    // Update the current page number
                    currentPage = newPage;

                    // Update the active pagination button
                    pagination.find("a").removeClass("active");
                    $(this).addClass("active");

                    // Update the table rows
                    updateTableRows(currentPage);
                }
            });

            // Call the initial sorting to sort the data based on the default column
            updateTable(0, 1);
            updateTableRows(currentPage);
        });
    </script>
    @extends('templates.footer')
</body>
<style>
    /* CSS untuk elemen cetak */
    @media print {
        body * {
            visibility: hidden;
        }

        .aksesori,
        .aksesori * {
            visibility: visible;
        }

        .aksesori {
            position: absolute;
            left: 0;
            top: 0;
        }

        .button.wrapper * {
            display: none;
            visibility: none;
        }
    }
</style>

<style>
    .date {
        margin-right: 16px;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .aksesori {
        flex-grow: 1;
        min-height: calc(100vh - 60px);
    }

    .table th {
        background-color: #3c6687;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 4rem;
        border-bottom: 1px solid #493d3d
    }

    .table td {
        margin: 0;
        padding: 0 4px 0 4px;
        vertical-align: middle;
        height: 6rem;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin: 1rem 0 3rem 0;
    }

    .pagination a {
        margin: 0 0.5rem;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border: 1px solid #4caf50;
        color: #4caf50;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #6ac063;
        color: white;
    }

    .pagination .active {
        background-color: #6ac063;
        color: white;
    }

    img {
        height: 26px;
        width: 26px;
        margin: 4px;
        padding: 0;
    }

    .date {
        font-size: 18px;
        margin-top: 10px;
    }

    .btn-add {
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
    }

    .btn-refresh {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-refresh:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-refresh:hover img.refresh {
        content: url('icon/refresh-hover.svg');
    }

    .btn-print {
        background-color: #ffef0f;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-print:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761
    }

    .btn-export {
        background-color: #6ac063;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-export:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761
    }

    .btn-edit-pencil {
        background-color: #d96652;
        color: #e9ecf1;
        border-radius: 100%;
    }

    .btn-edit-pencil:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d
    }

    .btn-delete {
        background-color: #33434f;
        color: #ffffff;
        border-radius: 0.3rem
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f
    }
</style>

</html>
