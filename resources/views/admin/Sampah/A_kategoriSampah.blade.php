<!DOCTYPE html>
@extends('layout.main')

@section('title', 'Daftar Kategori')

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
    <h1 class="h3 mb-2 text-gray-800">Kategori Sampah</h1>

    @if (session('statusSukses'))
        <div class="alert alert-success">
            {{ session('statusSukses') }}
        </div>
    @endif

    @if (session('statusGagal'))
        <div class="alert alert-danger">
            {{ session('statusGagal') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('viewTambahKategoriSampah') }}" class="btn btn-primary" id="tambahKategori">
                <i class="fa fa-plus" aria-hidden="true"> Tambah Kategori</i>
            </a>
            <form>
                @csrf
                <input type="hidden" name="sessionSell" id="sessionSell" value="">
                <input type="hidden" name="sessionReturn" id="sessionReturn" value="">
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga Per Kg</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga Per Kg</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kategori as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->nama }}</td>
                            <td>{{ $list->harga }}</td>
                            <td>
                                <form action="{{ route('hapusKategori', $list->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin akan hapus kategori?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-primary my-1 btn-sm" style="font-size: 10px" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
