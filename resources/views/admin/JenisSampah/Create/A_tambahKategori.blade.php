<!DOCTYPE html>
@extends('layout.main')

@section('title', 'Tambah Kategori')

@section('sidebar')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardAdmin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bank Sampah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboardAdmin') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Master Sampah -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenjualan"
            aria-expanded="true" aria-controls="collapsePenjualan">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span>Sampah</span>
        </a>
        <div id="collapsePenjualan" class="collapse show" aria-labelledby="headingPenjualan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Sampah:</h6>
                <a class="collapse-item active" href="{{ route("homeKategoriSampah") }}">Kategori</a>
                <a class="collapse-item" href="{{ route("homeJenisSampah") }}">Jenis Sampah</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
@endsection

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Kategori</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{ route('tambahKategoriSampah') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Kategori..." autofocus>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ "Nama Kategori harus diisi" }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga Per Kg</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Per Kg..." autofocus>
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ "Harga Kategori harus diisi" }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
@endsection
