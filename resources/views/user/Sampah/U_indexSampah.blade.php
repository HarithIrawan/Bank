<!DOCTYPE html>
@extends('layout.main')

@section('title', 'Daftar Transaksi')

@section('sidebar')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardUser') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bank Sampah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboardUser') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Input Sampah -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('homeInputSampah') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Sampah</span></a>
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
    <h1 class="h3 mb-2 text-gray-800">Transaksi Sampah</h1>

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
            <a href="{{ route('viewTambahInputSampah') }}" class="btn btn-primary" id="tambahTransaksi">
                <i class="fa fa-plus" aria-hidden="true"> Tambah Transaksi</i>
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
                            <th>Kategori</th>
                            <th>Jumlah (Kg)</th>
                            <th>Harga Per Kg</th>
                            <th>Harga Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Jumlah (Kg)</th>
                            <th>Harga Per Kg</th>
                            <th>Harga Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($input as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->nama }}</td>
                            <td>{{ $list->kategori }}</td>
                            <td>{{ $list->jumlah }}</td>
                            <td>{{ $list->hargaPerKg }}</td>
                            <td>{{ $list->hargaTotal }}</td>
                            <td>{{ $list->status }}</td>
                            <td>
                                <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin akan hapus kategori?')">
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
