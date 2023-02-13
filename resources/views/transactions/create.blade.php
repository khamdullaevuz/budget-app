@extends('adminlte::page')

@section('title', 'Qo\'shish - Bo\'limlar')

@section('content_header')
    <h1 class="m-0 text-dark">Qo'shish</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('transactions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nomi</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?? $transaction->name}}" aria-describedby="nameHelp">
                    @error('name')
                    <small id="nameHelp" class="form-text text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Tasnif</label>
                    <textarea name="description" class="form-control" id="description" rows="3" aria-describedby="descriptionHelp">{{old('name') ?? $transaction->name}}</textarea>
                    @error('description')
                    <small id="descriptionHelp" class="form-text text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="type">Turi</label>
                            <select name="type" class="form-control" id="type" aria-describedby="typeHelp">
                                <option value="">Tanlang</option>
                                <option value="income" {{old('type') ?? $transaction->type == 'income' ? 'selected' : ''}}>Kirim</option>
                                <option value="expense" {{old('type') ?? $transaction->type == 'expense' ? 'selected' : ''}}>Chiqim</option>
                            </select>
                            @error('type')
                            <small id="typeHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category_id">Bo'lim</label>
                            <select name="category_id" class="form-control" id="category_id" aria-describedby="categoryIdHelp" disabled>
                                <option value="">Tanlanmagan</option>
                            </select>
                            @error('category_id')
                            <small id="categoryIdHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment_method">To'lov turi</label>
                    <select name="payment_method" class="form-control" id="payment_method" aria-describedby="paymentMethodHelp">
                        <option value="cash" {{old('payment_method') ?? $transaction->payment_method == 'cash' ? 'selected' : ''}}>Naqd</option>
                        <option value="card" {{old('payment_method') ?? $transaction->payment_method == 'card' ? 'selected' : ''}}>Karta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Summa</label>
                    <input type="number" name="amount" class="form-control" id="amount" value="{{old('amount') ?? $transaction->amount}}" aria-describedby="amountHelp">
                </div>
                <button type="submit" class="btn btn-primary">Yaratish</button>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $("#type").change(function(){
            let type = $(this).val();
            $.ajax({
                url: "{{route('category.type', ':type')}}".replace(':type', type),
                type: "GET",
                dataType: "json",
                success: function(data){
                    data = data.data;
                    let category = $("#category_id");
                    category.empty();
                    category.append('<option value="">Tanlang</option>');
                    $.each(data, function(key, value){
                        category.append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    category.removeAttr('disabled');
                }
            });
        });
    </script>
@stop
