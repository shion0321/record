
<div class="image_area">
    <label for="{{ $name }}" class="font-weight-bold">{{ $label }}</label>
    <div class="input-group form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="{{ $name }}">
            <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
        </div>
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-secondary reset">取消</button>
        </div>
    </div>
    @if(isset($record))
        <img src="{{ $record }}">
    @endif
</div> 