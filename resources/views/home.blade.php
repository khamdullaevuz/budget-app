@extends('adminlte::page')

@section('title', 'Bosh sahifa')

@section('content_header')
    <h1 class="m-0 text-dark">Bosh sahifa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-12">
            <div class="small-box bg-gradient-navy">
                <div class="inner">
                    <h3 class="counting">{{$transactions}}</h3>
                    <p>Tranzaksiyalar soni</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                </div>
                <a href="{{route('transactions.index')}}" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3 class="counting">{{Number::format($income)}}</h3>
                    <p>Kirimlar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-plus"></i>
                </div>
                <a href="{{route('transactions.index')}}" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3 class="counting">{{Number::format($expense)}}</h3>
                    <p>Chiqimlar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-minus"></i>
                </div>
                <a href="{{route('transactions.index')}}" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-primary">
                <div class="inner">
                    <h3 class="counting">{{Number::format($balance)}}</h3>
                    <p>Balans</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="{{route('transactions.index')}}" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-fw fa-dollar-sign"></i>Balanslar:</h4>
                    <span><b>Jami</b>: </span><span class="badge badge-pill @if($balance >= 1000000) badge-success @elseif($balance >= 500000) badge-warning @else badge-danger @endif">{{Number::format($balance)}}</span><br>
                    <span><b>Karta balansi</b>: </span><span class="badge badge-pill @if($card_balance >= 1000000) badge-success @elseif($card_balance >= 500000) badge-warning @else badge-danger @endif">{{Number::format($card_balance)}}</span><br>
                    <span><b>Naqd balansi</b>: </span><span class="badge badge-pill @if($cash_balance >= 1000000) badge-success @elseif($cash_balance >= 500000) badge-warning @else badge-danger @endif">{{Number::format($cash_balance)}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-fw fa-dollar-sign"></i>Balans eslatmalari:</h4>
                    <span class="badge badge-pill badge-success">{{Number::format(1000000)}}+</span> Yaxshi<br>
                    <span class="badge badge-pill badge-warning">{{Number::format(500000)}}+</span> O'rta<br>
                    <span class="badge badge-pill badge-danger">{{Number::format(500000)}}-</span> Yomon
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card" @if(!$expense_info and $income_info) style="height: 95%" @endif>
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Kirimlar</h3>
                        <a href="{{route('transactions.index')}}">Barchasini ko'rish</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($income_info)
                        <canvas id="income_info" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    @else
                        <h4>Hech narsa topilmadi</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card" @if(!$income_info and $expense_info) style="height: 95%" @endif>
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Chiqimlar</h3>
                        <a href="{{route('transactions.index')}}">Barchasini ko'rish</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($expense_info)
                        <canvas id="expense_info" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    @else
                        <h4>Hech narsa topilmadi</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card" @if(!$expense_per_month and $income_per_month) style="height: 95%" @endif>
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Oylar bo'yicha kirimlar</h3>
                        <a href="{{route('transactions.index')}}">Barchasini ko'rish</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($income_per_month)
                        <canvas id="income_per_month" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    @else
                        <h4>Hech narsa topilmadi</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card" @if(!$income_per_month and $expense_per_month) style="height: 95%" @endif>
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Oylar bo'yicha chiqimlar</h3>
                        <a href="{{route('transactions.index')}}">Barchasini ko'rish</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($expense_per_month)
                        <canvas id="expense_per_month" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    @else
                        <h4>Hech narsa topilmadi</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom_js')
    <script>
        $(function () {
            @if($income_info)
            var income_info = document.getElementById('income_info').getContext('2d');
            new Chart(income_info, {
                type: 'pie',
                data: {
                    labels: [
                        @foreach($income_info as $info)
                            '{{$info['name']}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Kirimlar',
                        data: [
                            @foreach($income_info as $info)
                                '{{$info['amount']}}',
                            @endforeach
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            });
            @endif

            @if($expense_info)
            var expense_info = document.getElementById('expense_info').getContext('2d');
            new Chart(expense_info, {
                type: 'pie',
                data: {
                    labels: [
                        @foreach($expense_info as $info)
                            '{{$info['name']}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Chiqimlar',
                        data: [
                            @foreach($expense_info as $info)
                                '{{$info['amount']}}',
                            @endforeach
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    }
                }
            });
            @endif

            @if($income_per_month)
            const income_per_month = document.getElementById('income_per_month').getContext('2d');
            new Chart(income_per_month, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($income_per_month as $info)
                            '{{Month::getMonthName($info['month']) . ' ' . $info['year']}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Kirimlar',
                        data: [
                            @foreach($income_per_month as $info)
                                '{{$info['amount']}}',
                            @endforeach
                        ],
                        backgroundColor: [
                            "rgba(126,188,89,0.7)",
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            @endif

            @if($expense_per_month)
            const expense_per_month = document.getElementById('expense_per_month').getContext('2d');
            new Chart(expense_per_month, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($expense_per_month as $info)
                            '{{Month::getMonthName($info['month']) . ' ' . $info['year']}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Chiqimlar',
                        data: [
                            @foreach($expense_per_month as $info)
                                '{{$info['amount']}}',
                            @endforeach
                        ],
                        backgroundColor: [
                            "rgba(247,23,53,0.7)",
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            @endif
        });
    </script>
@stop
