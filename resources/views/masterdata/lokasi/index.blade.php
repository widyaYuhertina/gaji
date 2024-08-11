@extends('adminlte::page')

@section('title', 'Data Lokasi')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Lokasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Lokasi</strong></h2>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary btn-md float-right"> Tambah Lokasi</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="lokasi">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA LOKASI</th>
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
            var dataTable = $('#lokasi').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.lokasi') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_lokasi',
                        name: 'nama_lokasi'
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
