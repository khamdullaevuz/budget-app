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
    <label for="type">Turi</label>
    <select name="type" class="form-control" id="type" aria-describedby="typeHelp">
        <option value="income" {{old('type') ?? $transaction->type == 'income' ? 'selected' : ''}}>Kirim</option>
        <option value="expense" {{old('type') ?? $transaction->type == 'expense' ? 'selected' : ''}}>Chiqim</option>
    </select>
    @error('type')
    <small id="typeHelp" class="form-text text-muted">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="category_id">Bo'lim</label>
    <select name="category_id" class="form-control" id="category_id" aria-describedby="categoryIdHelp">
        <option value="">Tanlanmagan</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{old('category_id') ?? $category->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    <small id="categoryIdHelp" class="form-text text-muted">{{$message}}</small>
    @enderror
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
