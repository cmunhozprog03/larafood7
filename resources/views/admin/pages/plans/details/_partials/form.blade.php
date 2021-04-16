
@csrf

<div class="form-group">
  <label for="">Nome:</label>
  <input type="text" class="w3-input w3-border-dark-gray" name="name" value="{{ $detail->name ?? old('name') }}">
  @error('name')
      <span class="text-danger">{{ $message }}<span>
  @enderror
</div>


</div>

