<!DOCTYPE html>
@extends('layout.main')

@section('title', 'Dashboard')

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
        <li class="nav-item active">
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
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenjualan"
                aria-expanded="true" aria-controls="collapsePenjualan">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Sampah</span>
            </a>
            <div id="collapsePenjualan" class="collapse" aria-labelledby="headingPenjualan"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master Sampah:</h6>
                    <a class="collapse-item" href="{{ route("homeKategoriSampah") }}">Kategori</a>
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
        <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>

        <!-- Content Row -->
        <div class="row">

            <form>
                @csrf
                <input type="hidden" name="sessionSell" id="sessionSell" value="{{ session('id_penjualan') }}">
                <input type="hidden" name="sessionReturn" id="sessionReturn" value="{{ session('id_return') }}">
            </form>

            <!-- Border Left Utilities -->
            <div class="col-lg-12">

                <div class="card mb-4 py-3 border-left-primary">
                    <div class="card-body" style="text-align: justify">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

