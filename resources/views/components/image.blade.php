<div class='form-group'>
    <label for="{{ $name }}">
        {{ $label }}
    </label>
    <div>
        <img src="{{ $record ?? '' }}" alt="" class="w-100">
    </div>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control">
</div>
