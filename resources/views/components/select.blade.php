
<div class="form-group">
    <label for="" class="font-weight-bold">{{ $label }}</label>
    <select id="" class="form-control" name="{{ $name }}">
        @foreach ($records as $key => $value)
            <option value="{{ $key }}" {{ old($name) == $key ? 'selected' : ''}}>{{ $value }}</option>
        @endforeach
    </select>
</div>
