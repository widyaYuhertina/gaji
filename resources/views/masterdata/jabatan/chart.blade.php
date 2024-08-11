@extends('adminlte::page')

@section('title', 'Data Jabatan')
@section('plugins.Chartjs', true)

@section('content_header')
<h1 class="m-0 text-dark">Grafik Pendapatan Per Jabatan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h2 class="card-title"><strong>Grafik Pendapatan Perjabatan</strong></h2>

            </div>
            <div class="card-body">
                <div style="width: 800px;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{ route('get.grafik.jabatan') }}",
            success: function (response) {
                var labels = response.data.map(function (e) {
                    return e.nama_jabatan
                })

                var data = response.data.map(function (e) {
                    return e.gapok_jabatan
                })

                var ctx = $('#myChart');
                var config = {
                    type: 'bar',
                    data: {
                        labels: labels, datasets: [{
                            label: 'Transaksi Status',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 1)',

                        }]
                    }
                };
                var chart = new Chart(ctx, config);
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            }
        });
    });
    </script>
@endpush