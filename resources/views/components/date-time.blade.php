<div>
    <div class='form-group'>
        <label for="{{ $name }}" class="font-weight-bold">
            {{ $label }}
        </label>
        <input type="datetime-local" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ $record ? $record->format('Y-m-d\TH:i') : '' }}" >
    </div>
</div>