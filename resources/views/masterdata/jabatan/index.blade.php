@extends('adminlte::page')

@section('title', 'Data Jabatan')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Jabatan</h1>
    <a href="{{ route('print.jabatan') }}" class="btn btn-success btn-md" target="_blank"> Print Jabatan</a>
    <a href="{{ route('grafik.jabatan') }}" class="btn btn-danger btn-md"> Grafik Jabatan</a>
    <a href="{{ route('export.excel') }}" class="btn btn-info btn-md"> Export Excel</a>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Jabatan</strong></h2>
                    <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-md float-right"> Tambah Jabatan</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="jabatan">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA JABATAN</th>
                                    <th>GAJI POKOK</th>
                                    <th>TUNJANGAN</th>
                                    <th>UANG MAKAN</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#jabatan').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.jabatan') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_jabatan',
                        name: 'nama_jabatan'
                    },
                    {
                        data: 'gapok_jabatan',
                        name: 'gapok_jabatan'
                    },
                    {
                        data: 'tunjangan_jabatan',
                        name: 'tunjangan_jabatan'
                    },
                    {
                        data: 'uang_makan_perhari',
                        name: 'uang_makan_perhari'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        'sClass': 'text-center'
                    }
                ]
            });
        });
    </script>
@endpush
