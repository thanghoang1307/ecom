@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="quick-report today">
                                <div class="date-period">Hôm nay</div>

                                <div class="revenue price">{{ $sale->today->sum('total') }}<sup>đ</sup></div>

                                <div class="order-number">{{ count($sale->today) }} đơn hàng</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="quick-report">
                                <div class="date-period">Hôm qua</div>

                                <div class="revenue price">{{ $sale->yesterday->sum('total') }}<sup>đ</sup></div>

                                <div class="order-number">{{ count($sale->yesterday) }} đơn hàng</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="quick-report">
                                <div class="date-period">Tuần này</div>

                                <div class="revenue price">{{ $sale->thisWeek->sum('total') }}<sup>đ</sup></div>

                                <div class="order-number">{{ count($sale->thisWeek) }} đơn hàng</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="quick-report">
                                <div class="date-period">Tháng này</div>

                                <div class="revenue price">{{ $sale->thisMonth->sum('total') }}<sup>đ</sup></div>

                                <div class="order-number">{{ count($sale->thisMonth) }} đơn hàng</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
     <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 col-12"><strong>Tổng doanh thu</strong></div>
                                <div class="col-md-6 col-12 align-right">
                                    <select name="period">
                                        <option value="by-day" selected="">Theo ngày</option>

                                        <option value="by-month">Theo tháng</option>

                                        <option value="by-year">Theo năm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart" width="3" height="1"></canvas>
                        </div>

                        <div class="card-footer clearfix"></div>
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 col-12"><strong>Sản phẩm bán chạy</strong></div>

                                <div class="col-md-6 col-12 align-right">
                                    <select name="period">

                                        <option value="by-week" selected="">Theo tuần</option>

                                        <option value="by-month">Theo tháng</option>

                                        <option value="by-year">Theo năm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if(count($topPrds->byWeek))
    @foreach ($topPrds->byWeek as $prd)
    <div class="item row">
        <div class="col-md-3 col-12 thumb-image">
            <div class="text-center wrap-img">
                <img src="{{ $prd->thumb }}" width="100%">
            </div>
        </div>
        <div class="col-md-9 col-12">
            <a class="pre-line" href="{{ route('admin.prd.edit',$prd->id)}}" target="_blank">{{ $prd->name }}</a>
            <div class="sold">Đã bán {{ $prd->total }} sản phẩm</div>
        </div>
    </div>
    @endforeach

    @else
    <div class="no-bestsale">Không có sản phẩm bán ra trong phạm vi ngày này.</div>
    @endif


                        </div>
                    </div>
                </div>
</div>




@endsection
@section('script')

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($date_range); ?>,
        datasets: [{
            label: 'Doanh thu',
            data: <?php echo json_encode($sale_range); ?>,
            backgroundColor: '#007bff',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                        if(parseInt(value) >= 1000){
                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        } else {
                            return value;
                        }
                    }
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                    if (label) {
                        label += ': ';
                    }
                    if(parseInt(tooltipItem.yLabel) >= 1000) {
                    label += tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                    else {
                    label += tooltipItem.yLabel;
                    }
                    return label;
                }
            }
        }
    }
});

</script>
@endsection