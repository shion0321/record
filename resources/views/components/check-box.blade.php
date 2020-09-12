<div class="">
    <label for="">
        {{ $label }}
    </label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="" value="{{ $upName ?? '' }}" @if(isset($record) && $record == $upName) checked @endif>
        <label class="form-check-label" for="">{{ $upName ?? '' }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="" value="{{ $downName?? '' }}" @if(isset($record) && $record == $downName) checked @endif>
        <label class="form-check-label" for="">{{ $downName ?? '' }}</label>
    </div>
</div>
