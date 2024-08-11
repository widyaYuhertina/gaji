@extends('adminlte::page')

@section('title', 'Data Jabatan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Jabatan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Edit Data Jabatan</strong></h3>
                </div>

                <div class="card-body">
                    @include('partials._error')

                    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Nama Jabatan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="nama_jabatan" placeholder="Manager Produksi" class="form-control"
                                        value="{{ isset($jabatan) ? $jabatan->nama_jabatan : old('nama_jabatan') }}" required>
                                </div>
                            </div>

                            <label class="form-label col-sm-2">Gaji Pokok</label>
                            <div class="col-sm-4">
                                <input type="number" name="gapok_jabatan" placeholder="Rp.0" class="form-control"
                                    value="{{ isset($jabatan) ? $jabatan->gapok_jabatan : old('gapok_jabatan') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Tunjangan Jabatan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="tunjangan_jabatan" placeholder="Rp.0" class="form-control"
                                        value="{{ isset($jabatan) ? $jabatan->tunjangan_jabatan : old('tunjangan_jabatan') }}" required>
                                </div>
                            </div>

                            <label class="form-label col-sm-2">Insentif Uang Makan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="uang_makan_perhari" placeholder="Rp.0" class="form-control"
                                        value="{{ isset($jabatan) ? $jabatan->uang_makan_perhari : old('uang_makan_perhari') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('jabatan.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
