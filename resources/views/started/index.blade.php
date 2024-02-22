@extends('layouts.main')

@section('container')
    <div class="starter-container">
        <div class="header">
            <h1>Selamat Datang Di Website Sistem Inventaris</h1>
        </div>
        <div class="content">
            <p>PT SATRIYO MEGA SARANA</p>
            <a href="/kendaraan" class="btn btn-primary">List Inventaris</a>
        </div>
    </div>
@endsection

<style>
    /* CSS Styling */
.starter-container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    text-align: center;
}

.header {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    color: #fff;
    background-color: #2ecc71;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #27ae60;
}

</style>