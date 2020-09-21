<div class='form-group'>
    <label for="{{ $name }}" class="font-weight-bold">
        {{ $label }}
    </label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control">
        <div>
            <img src="{{ $record ?? '' }}" alt="" class="w-100">
        </div>
</div>
