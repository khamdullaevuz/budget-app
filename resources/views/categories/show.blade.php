@extends('adminlte::page')

@section('title', 'Ko\'rish - Bo\'limlar')

@section('content_header')
    <h1 class="m-0 text-dark">Ko'rish</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0"><b>Nomi</b>: {{$category->name}}</p>
                    <p class="mb-0"><b>Qisqacha tarif</b>: {{$category->description}}</p>
                    <p class="mb-0"><b>Turi</b>: @if($category->type == "income")<span class="badge badge-pill badge-success">Kirim</span>@else<span class="badge badge-pill badge-danger">Chiqim</span>@endif</p>
                </div>
            </div>

            <a href="{{route('categories.index')}}" class="btn btn-primary">Ortga</a>
        </div>
    </div>
@stop
