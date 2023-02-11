@extends('adminlte::page')

@section('title', 'Tranzaksiyalar')

@section('content_header')
    <div class="d-flex">
        <div class="p-1 flex-grow-1">
            <h1 class="m-0 text-dark">Tranzaksiyalar</h1>
        </div>
        <div class="p-1">
            <div class="float-right">
                <a type="button" href="{{route('transactions.create')}}" class="btn btn-success">Qo'shish</a>
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
                                <th scope="col">Bo'lim</th>
                                <th scope="col">Summa</th>
                                <th scope="col">Sana</th>
                                <th scope="col">To'lov turi</th>
                                <th scope="col">Tranzaksiya turi</th>
                                <th scope="col">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <th scope="row">
                                        {{ ($transactions->currentpage() - 1) * $transactions->perpage() + ($loop->index + 1) }}
                                    </th>
                                    <td>{{ $transaction->name }}</td>
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{ $transaction->category->name }}</td>
                                    <td>{{ $transaction->formatted_amount }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>@if($transaction->payment_method == "cash")<span class="badge badge-pill badge-dark">Naqd</span>@else<span class="badge badge-pill badge-dark">Karta</span>@endif</td>
                                    <td>@if($transaction->type == "income")<span class="badge badge-pill badge-success">Kirim</span>@else<span class="badge badge-pill badge-danger">Chiqim</span>@endif</td>
                                    <td><a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i></button>
                                        </form></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Hech narsa topilmadi</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $transactions->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            e.preventDefault();
            let $form = $(this).closest('form');
            Swal.fire({
                title: 'Bunga aminmisiz?',
                text: "Ushbu amalni ortga qaytarib bo'lmaydi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ha, o\'chiraman!',
                cancelButtonText: 'Bekor qilish'
            }).then((result) => {
                if (result.isConfirmed) {
                    $form.submit();
                }
            })
        });
    </script>
@stop
