@extends('adminlte::page')

@section('title', 'Data Pengguna')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengguna</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Edit Data Pengguna</strong></h3>
                </div>
                <div class="card-body">
                    @include('partials._error')

                    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Nama Lengkap</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="name" placeholder="Masukkan Nama Lengkap"
                                        class="form-control" value="{{ isset($pengguna) ? $pengguna->name : old('name') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Email</label>
                            <div class="col-sm-4">
                                <input type="email" name="email" placeholder="Masukkan Email" class="form-control"
                                    value="{{ isset($pengguna) ? $pengguna->email : old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Password</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="password" name="password" placeholder="Masukkan Password" class="form-control" value="{{ old('password') }}">
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Level</label>
                            <div class="col-sm-4">
                                <select name="level" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Level -</option>
                                    <option value="ADMIN" {{ $pengguna->level == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                                    <option value="PEGAWAI" {{ $pengguna->level == 'PEGAWAI' ? 'selected' : '' }}>PEGAWAI</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('pengguna.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
