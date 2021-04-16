
@csrf

<div class="form-group">
  <label for="">Nome:</label>
  <input type="text" class="w3-input w3-border-dark-gray" name="name" value="{{ $plan->name ?? old('name') }}">
  @error('name')
      <span class="text-danger">{{ $message }}<span>
  @enderror
</div>

<div class="form-group">
  <label for="">Preço:</label>
  <input type="text" class="w3-input w3-border-dark-gray" name="price" value="{{ $plan->price ?? old('price') }}">
  @error('price')
      <span class="text-danger">{{ $message }}<span>
  @enderror
</div>

<div class="form-group">
  <label for="">Decrição:</label>
  <input type="text" name="description" id="" class="w3-input w3-border-dark-gray" 
    value="{{ $plan->description ?? old('description') }}">
  @error('description')
    <span class="text-danger">{{ $message }}<span>
  @enderror
</div>

