@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pesanan</h4>
                            </div>
                            <div class="card-body">
                                {{ $pesanan->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pesanan Keseluruhan</h4>
                            </div>
                            <div class="card-body">
                                {{-- hitung jumlah harga yang sudah di TF --}}
                                Rp. {{ number_format($total_harga_pesanan->select('jumlah_harga')->sum('jumlah_harga')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Konfirmasi Pesanan</h4>
                            </div>
                            <div class="card-body">
                                {{ $total_harga_pesanan->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapatan Tiap Bulan</h4>
                        </div>
                        <div class="card-body">
                            <div id="myChart">

                            </div>
                            {{-- <canvas id="myChart" height="158"></canvas> --}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var pendapatan = <?php echo json_encode($total_harga_bulanan); ?>;
        var bulan = <?php echo json_encode($bulan); ?>;

        Highcharts.chart('myChart', {
            title: {
                text: 'Grafik Pendapatan Bulanan'
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Nominal Pendapatan Bulanan'
                }
            },
            plotOption: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Nominal Pendapatan Rp',
                data: pendapatan
            }]
        });
    </script>
@endsection
