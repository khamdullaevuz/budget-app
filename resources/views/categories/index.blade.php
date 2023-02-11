@extends('adminlte::page')

@section('title', 'Bo\'limlar')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Bo'limlar</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" class="btn btn-success">Qo'shish</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <p>Ma'lumotlar</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomi</th>
                                <th scope="col">Qisqacha tarif</th>
                                <th scope="col">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th scope="row">
                                        {{ ($categories->currentpage() - 1) * $categories->perpage() + ($loop->index + 1) }}
                                    </th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><a href="" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Hech narsa topilmadi</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{ $categories->appends(request()->input())->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
