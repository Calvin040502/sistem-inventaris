<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Aset Elektronik</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<script>
    // Function to print the list of Elektronik
    function printElektronikList() {
        var printContents = document.querySelector('.elektronik').innerHTML;
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
    <div class="input mb-2" style="padding: 1.5rem 24px 1.5rem 24px">
            <div class="row">
                <div class="col">
                    <a href="{{ route('elektronik.create') }}" class="btn btn-add mb-1"
                        style="margin-right: 24px">Tambah</a>
                    <a href="{{ url('elektronik/export/excel') }}" class="btn btn-export mb-1 ">Export To Excel</a>
                    <button class="btn btn-print mb-1" onclick="printElektronikList()">Print</button> <!-- Tombol Print -->
                </div>
                <div class="col" style="padding-left:50%">
                    <form action="/kendaraan" method="GET" class="float-right">
                        <div class="input-group" style="padding-left: ;">
                            <input type="search" style="border-top-right-radius: 0; border-bottom-right-radius: 0"
                                class="form-control shadow-sm bg-body-tertiary" placeholder="Search..." name="search"
                                value="{{ request('search') }}">
                            <div class="input-group-append" style="padding-left: 2px;">
                                <button class="btn btn-primary"
                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0; padding: 4px"
                                    type="submit"><img src="{{ asset('icon/search.svg') }}" alt=""></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <section class="elektronik" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('elektronik') }}" class="text-decoration-none"
                style="color: black">List Aset Kendaraan</a>
        </h1>
        

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="elektronik-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 6px"
                            id="sortNo">No.</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortKode">Kode</th>
                        <th style="width: 6rem; cursor: pointer;" >Jenis Elektronik</th>
                        <th style="width: 5rem;">Merk</th>
                        <th style="width: 4.5rem; cursor: pointer;" id="sortTahun">Tahun Perolehan</th>
                        <th style="width: 8.5rem;">Harga Perolehan</th>
                        <th style="width: 4rem;">Masa Guna</th>
                        <th style="width: 4rem;">Lama Pakai</th>
                        <th style="width: 1rem;">Kondisi</th>
                        <th style="width: 1rem;">Lokasi</th>
                        <th style="width: 1rem;">Pengguna</th>
                        <th
                            style="width: 5rem; @cannot('super admin')
                        border-top-right-radius: 6px                            
                        @endcannot">
                        @can('super admin')
                            <th style="width: 6.7rem; border-top-right-radius: 6px"> Action</th>
                        @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elektroniks as $elektronik)
                        <tr onclick="window.location.href='{{ route('elektronik.detail', ['elektronik' => $elektronik->id]) }}';"
                            style="cursor: pointer;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $elektronik->kode }}</td>
                            <td>{{ $elektronik->jenis_elektronik }}</td>
                            <td>{{ $elektronik->merek }}</td>
                            <td>{{ $elektronik->tahun_perolehan }}</td>
                            <td>{{ $elektronik->harga_perolehan }}</td>
                            <td>{{ $elektronik->masa_guna }}</td>
                            <td>{{ $elektronik->lama_pakai }}</td>
                            <td>{{ $elektronik->kondisi }}</td>
                            <td>{{ $elektronik->lokasi }}</td>
                            <td>{{ $elektronik->pengguna }}</td>
                            @can('super admin')
                                <td
                                    style="padding-left: 1rem; display: flex; height: 6rem; justify-content: space-around; align-items: center">
                                    <a class="btn btn-edit-pencil" href="{{ route('elektronik.edit', $elektronik->id) }}">
                                        <img src="{{ asset('icon/pen2.svg') }}" alt="" style="margin: 4px 0 4px 0">
                                    </a>

                                    <form action="{{ route('elektronik.destroy', $elektronik->id) }}}}" method="POST"
                                        class="d-inline-grid">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-delete" onclick="return confirm('Are you sure?')"
                                            style="margin:0 ; padding: 6.5px 8px 6.5px 8px; border-radius: 100%;">
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
        $(document).ready(function() {
            // Initialize sorting order for each column
            let noSortOrder = 1;
            let kodeSortOrder = 1;
            let tahun_perolehanSortOrder = 1;
    
            // Function to update the entire table with sorted data
            function updateTable(sortKey, sortOrder) {
                const $table = $("table tbody");
                const $rows = $table.find("tr").get();
    
                $rows.sort(function(a, b) {
                    const aValue = $(a).find("td").eq(sortKey).text();
                    const bValue = $(b).find("td").eq(sortKey).text();
    
                    if (sortKey === 1) {
                        // Sorting No. Kwitansi
                        return sortOrder * aValue.localeCompare(bValue);
                    } else if (sortKey === 3) {
                        // Sorting Nama Lengkap
                        return sortOrder * aValue.localeCompare(bValue);
                    } else {
                        // Sorting other columns as numbers
                        return sortOrder * (parseFloat(aValue) - parseFloat(bValue));
                    }
                });
    
                $table.empty().append($rows);
            }
    
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
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to initialize the table with the specified number of items per page
            function initializeTable() {
                const table = $("#elektronik-table");
                const itemsPerPage = 11; // Jumlah item per halaman

                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                table.find("tr:lt(" + itemsPerPage + ")").show();
            }

            // Initialize the table when the document is ready
            initializeTable();

            // Get the table element
            const table = $("#elektronik-table");

            // Get the pagination element
            const pagination = $(".pagination");

            // Set the initial page number
            let currentPage = 1;

            // Set the number of items per page
            const itemsPerPage = 10;

            // Calculate the total number of pages
            const totalData = {{ $elektroniks->count() }}; // Ganti dengan jumlah data yang sesungguhnya
            const totalPages = Math.ceil(totalData / itemsPerPage);

            // Generate initial pagination buttons
            for (let i = 1; i <= totalPages; i++) {
                pagination.append(`<a href="#" class="${i === 1 ? 'active' : ''}">${i}</a>`);
            }

            // Function to hide and show rows based on the current page
            function updateTableRows() {
                // Hide all rows in the table, except the header
                table.find("tr").not("thead tr").hide();

                // Show the rows for the current page
                const startIdx = (currentPage - 1) * itemsPerPage;
                const endIdx = startIdx + itemsPerPage;
                table.find("tr").slice(startIdx, endIdx).show();
            }

            // **Add the header to the table**
            table.append(table.find("thead"));

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
                    updateTableRows();
                }
            });
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
        .elektronik, .elektronik * {
            visibility: visible;
        }
        .elektronik {
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

    .elektronik {
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
        margin-top: 1rem;
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
