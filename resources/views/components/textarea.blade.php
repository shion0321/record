<div class='form-group'>
    <label for="{{ $name }}" class="font-weight-bold">
        {{ $label }}
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control textarea-primary">{{ $record??'' }}</textarea>

</div>
