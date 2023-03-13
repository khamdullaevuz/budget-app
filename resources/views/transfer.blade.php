@extends('adminlte::page')

@section('title', 'O\'tkazma yaratish')

@section('content_header')
    <h1 class="m-0 text-dark">O'tkazma yaratish</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('transfer.store')}}" method="POST">
                @csrf
                <label for="type">Turi</label>
                <select name="type" class="form-control" id="type" aria-describedby="typeHelp">
                    <option value="">Tanlang</option>
                    <option value="income" {{old('type') == 'card2cash' ? 'selected' : ''}}>Kartadan naqdga</option>
                    <option value="expense" {{old('type') == 'cash2card' ? 'selected' : ''}}>Naqddan kartaga</option>
                </select>
                @error('type')
                <small id="typeHelp" class="form-text text-muted">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="amount">Summa</label>
                    <input type="text" inputmode="decimal" name="amount" class="form-control" id="amount" value="{{old('amount')}}" aria-describedby="amountHelp">

                    @error('amount')
                    <small id="amountHelp" class="form-text text-muted">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Yaratish</button>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(function(){
            $('#amount').inputmask({
                alias: 'numeric',
                groupSeparator: ' ',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                prefix: '',
                placeholder: '0',
                rightAlign: false,
                oncleared: function () { self.Value(''); }
            });
        });
    </script>
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
