<div class="form-group">
    <label for="name">Nomi</label>
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
