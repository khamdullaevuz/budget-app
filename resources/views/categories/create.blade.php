@extends('adminlte::page')

@section('title', 'Qo\'shish - Bo\'limlar')

@section('content_header')
    <h1 class="m-0 text-dark">Qo'shish</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method="POST">
                        @include('categories.form')
                        @csrf
                        <button type="submit" class="btn btn-primary">Yaratish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
