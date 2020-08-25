<div class="">
    <label for="">
        {{ $label }}
    </label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="" value="{{ $upName ?? '' }}">
        <label class="form-check-label" for="">{{ $upName ?? '' }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="" value="{{ $downName?? '' }}">
        <label class="form-check-label" for="">{{ $downName ?? '' }}</label>
    </div>
</div>
