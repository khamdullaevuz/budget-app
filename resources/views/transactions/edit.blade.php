@extends('adminlte::page')

@section('title', 'Tahrirlash - Bo\'limlar')

@section('content_header')
    <h1 class="m-0 text-dark">Tahrirlash</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('categories.update', $category->id)}}" method="POST">
                        @method('PUT')
                        @include('categories.form')
                        @csrf
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
