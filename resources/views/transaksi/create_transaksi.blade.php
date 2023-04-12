@extends('layouts.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Course Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Course Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">
                <div class="card" style="width: 80%">
                    <div class="card-body ">
                        <form method="POST" action="{{ $urlform }}">
                            @csrf
                            {!! isset($transaksi) ? method_field('PUT') : '' !!}
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ $transaksi->nama ?? old('nama') }} " name="nama"
                                    type="text">
                                @error('nama')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mobil</label>
                                <input class="form-control @error('mobil') is-invalid @enderror"
                                    value="{{ isset($transaksi) ? $transaksi->mobil : old('mobil') }} " name="mobil"
                                    type="text">
                                @error('mobil')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No.Plat</label>
                                <input class="form-control @error('plat') is-invalid @enderror"
                                    value="{{ isset($transaksi) ? $transaksi->plat : old('plat') }} " name="plat"
                                    type="text">
                                @error('plat')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input class="form-control @error('tanggal_transaksi') is-invalid @enderror"
                                value="{{ isset($mhs)? $mhs->tanggal_transaksi : old('tanggal_transaksi') }}" name="tanggal_transaksi"
                                type="date"/>
                                @error('tanggal_transaksi')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-md btn-primary my-2 float-right" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
