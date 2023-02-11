@extends('adminlte::page')

@section('title', 'Bosh sahifa')

@section('content_header')
    <h1 class="m-0 text-dark">Bosh sahifa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-12">
            <div class="small-box bg-gradient-primary">
                <div class="inner">
                    <h3 class="counting">{{$transactions}}</h3>
                    <p>Tranzaksiyalar soni</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                </div>
                <a href="" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3 class="counting">{{$income}}</h3>
                    <p>Kirimlar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-plus"></i>
                </div>
                <a href="" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-navy">
                <div class="inner">
                    <h3 class="counting">{{$expense}}</h3>
                    <p>Chiqimlar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-minus"></i>
                </div>
                <a href="" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-12">

            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3 class="counting">{{$balance}}</h3>
                    <p>Balans</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="" class="small-box-footer">Batafsil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Balans eslatmalari:</h4>
            <span class="badge badge-pill badge-success">{{Number::format(1000000)}}</span> Yaxshi<br>
            <span class="badge badge-pill badge-warning">{{Number::format(100000)}}</span> O'rta<br>
            <span class="badge badge-pill badge-danger">{{Number::format(50000)}}</span> Yomon<br>
        </div>
    </div>
@stop
