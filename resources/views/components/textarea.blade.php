<div class='form-group'>
    <label for="{{ $name }}">
        {{ $label }}
    </label>
    {{-- {{ dd($record) }} --}}
    {{-- <textarea name="{{ $name }}" id="{{ $name }}" class="form-control"></textarea> --}}
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ $record??'' }}</textarea>

</div>
