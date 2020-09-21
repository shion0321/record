<div class='form-group'>
    <label for="{{ $name }}" class="font-weight-bold">
        {{ $label }}
    </label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ $record ?? '' }}">
</div>
