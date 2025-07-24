@extends('layouts.master')
@section('title')
    Statistik
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Laporan
        @endslot
        @slot('li_2')
            Statistik
        @endslot
        @slot('title')
            Statistik
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <canvas id="barChart" style="height:230px"></canvas>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ URL::asset('build/bower_components/chart.js/Chart.js') }}"></script>
    <script>
        $(function() {
            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var barChart = new Chart(barChartCanvas);

            var barChartData = {
                labels: {!! json_encode($byStatusLabeled->keys()) !!},
                datasets: [{
                    label: "Jumlah Pendaftar per Status",
                    fillColor: [
                        '#f39c12', // Belum Diverifikasi - Kuning
                        '#00a65a', // Diterima - Hijau
                        '#dd4b39' // Ditolak - Merah
                    ],
                    strokeColor: [
                        '#f39c12',
                        '#00a65a',
                        '#dd4b39'
                    ],
                    highlightFill: [
                        '#f5b041',
                        '#28b463',
                        '#e74c3c'
                    ],
                    highlightStroke: [
                        '#f5b041',
                        '#28b463',
                        '#e74c3c'
                    ],
                    data: {!! json_encode($byStatusLabeled->values()) !!}
                }]
            };

            var barChartOptions = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                barShowStroke: true,
                barStrokeWidth: 2,
                barValueSpacing: 5,
                barDatasetSpacing: 1,
                responsive: true,
                maintainAspectRatio: true
            };

            barChart.Bar(barChartData, barChartOptions);
        });
    </script>
@endpush
