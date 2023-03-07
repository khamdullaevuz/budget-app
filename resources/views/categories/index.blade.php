@extends('adminlte::page')

@section('title', 'Bo\'limlar')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Bo'limlar</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" href="{{route('categories.create')}}" class="btn btn-success">Qo'shish</a>
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
                                <th scope="col">Turi</th>
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
                                    <td>@if($category->type == "income")<span class="badge badge-pill badge-success">Kirim</span>@else<span class="badge badge-pill badge-danger">Chiqim</span>@endif</td>
                                    <td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                        </form></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Hech narsa topilmadi</td>
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
