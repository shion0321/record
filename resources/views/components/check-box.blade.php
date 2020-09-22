
<div class="form-group">
    <label class="font-weight-bold">
        {{ $label }}
    </label> 
    <div class="inline-radio">
        <div><input type="radio" name="{{ $name }}" value="{{ $upName }}" {{ $record == $upName ? 'checked' : '' }}><label>{{ $upName }}</label></div>
        <div><input type="radio" name="{{ $name }}" value="{{ $downName }}" {{ $record == $downName ? 'checked' : '' }}><label>{{ $downName }}</label></div>
    </div>
</div>
