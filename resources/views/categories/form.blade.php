<div class="form-group">
    <label for="name">Nomi*</label>
    <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?? $category->name}}" aria-describedby="nameHelp">
    @error('name')
    <small id="nameHelp" class="form-text text-muted">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="description">Tasnif</label>
    <textarea name="description" class="form-control" id="description" rows="3" aria-describedby="descriptionHelp">{{old('name') ?? $category->name}}</textarea>
    @error('description')
    <small id="descriptionHelp" class="form-text text-muted">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="type">Turi*</label>
    <select name="type" class="form-control" id="type" aria-describedby="typeHelp">
        <option value="">Tanlang</option>
        <option value="income" {{old('type') ?? $category->type == 'income' ? 'selected' : ''}}>Kirim</option>
        <option value="expense" {{old('type') ?? $category->type == 'expense' ? 'selected' : ''}}>Chiqim</option>
    </select>
    @error('type')
    <small id="typeHelp" class="form-text text-muted">{{$message}}</small>
    @enderror
</div>
