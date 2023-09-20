<!DOCTYPE html>
@extends('layout.main')

@section('title', 'Tambah Transaksi')

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
    <h1 class="h3 mb-2 text-gray-800">Tambah Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{ route('tambahTransaksiSampah') }}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" onchange="myF()">
                                <option value="option_select" disabled selected>Kategori</option>
                                @foreach($kategori as $category)
                                    <option value="{{ $category->nama }}">{{ $category->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah (Kg)</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah barang..." autofocus onchange="myG()">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ "Jumlah (Kg) harus diisi" }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga Per Kg</label>
                            <input type="number" class="form-control @error('hargakg') is-invalid @enderror" id="hargakg" name="hargakg" value="" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga Total</label>
                            <input type="text" class="form-control @error('hargatotal') is-invalid @enderror" id="hargatotal" name="hargatotal" autofocus readonly>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function myF() {
        var cat = document.getElementById("kategori").value;

        $.ajax({
            type: 'POST',
            url: '{{ route('updateHargaKg') }}',
            data: {'_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'post',
                    'kode': cat },
            success: function (data) {
                $("#hargakg").val(data.hargaKg);
            },
        });

    }

    function myG() {
        var cat2 = document.getElementById("jumlah").value;
        var cat3 = document.getElementById("hargakg").value;

        $("#hargatotal").val(cat2*cat3);

    }
</script>
@endsection
