{{-- 
@extends('layouts.app')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('record.update',$record) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">通貨ペア</label>
        <select id="" class="form-control" name="currency_pair">
            <option value="" selected @if(old('currency_pair')=='') selected  @endif>未選択</option>
            <option value="ユーロドル" {{ old('currency_pair') =='USDJPY'? 'selected' : ''}}>USDJPY</option>
            <option value="ユーロドル" {{ old('currency_pair') =='EURUSD'? 'selected' : ''}}>EURUSD</option>
            <option value="ポンドドル" {{ old('currency_pair') =='GBPUSD'? 'selected' : ''}}>GBPUSD</option>
        </select>

    </div>


    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a href="#oneday" class="nav-link active" data-toggle="tab">日足</a>
        </li>
        <li class="nav-item">
        <a href="#four_hours" class="nav-link" data-toggle="tab">4時間足</a>
        </li>
        <li class="nav-item">
        <a href="#one_hour" class="nav-link" data-toggle="tab">1時間足</a>
        </li>
        <li class="nav-item">
        <a href="#result" class="nav-link" data-toggle="tab">結果</a>
        </li>
    </ul>

  <div class="tab-content">
    <!-- 日足 -->
    <div id="oneday" class="tab-pane active">
        <x-check-box label="日足のトレンド方向" name="oneday_trend" up-name="上昇トレンド" down-name="下降トレンド" :record="$record['oneday_trend']"/>
        <x-image name="oneday_image_path" label="日足の画像" :record="$record['oneday_image_path']"/>
        <x-textarea name="oneday_flow" label="日足の値動きの流れ" :record="$record['oneday_flow']"/>
        <x-textarea name="oneday_entry_point" label="日足のエントリーポイント" :record="$record['oneday_entry_point']"/>
        <x-textarea name="oneday_profit_point" label="日足の利確位置" :record="$record['oneday_profit_point']"/>
        <x-textarea name="oneday_caution" label="日足の注意点" :record="$record['oneday_caution']"/>
    </div>
    <!-- 4時間足 -->
    <div id="four_hours" class="tab-pane">
        <x-check-box name="four_hours_trend" label="4時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド" :record="$record['four_hours_trend']"/>
        <x-image name="four_hours_image_path" label="4時間足の画像" :record="$record['four_hours_image_path']"/>
        <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ" :record="$record['four_hours_flow']"/>
        <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント" :record="$record['four_hours_entry_point']"/>
        <x-textarea name="four_hours_profit_point" label="4時間足の利確位置" :record="$record['four_hours_profit_point']"/>
        <x-textarea name="four_hours_caution" label="4時間足の注意点" :record="$record['four_hours_caution']"/>
    </div>
    <!-- 1時間足 -->
    <div id="one_hour" class="tab-pane">
        <x-check-box name="one_hour_trend" label="1時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド" :record="$record['one_hour_trend']"/>
        <x-image name="one_hour_image_path" label="1時間足の画像" :record="$record['one_hour_image_path']"/>
        <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ" :record="$record['one_hour_flow']"/>
        <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント" :record="$record['one_hour_entry_point']"/>
        <x-textarea name="one_hour_profit_point" label="1時間足の利確位置" :record="$record['one_hour_profit_point']"/>
        <x-textarea name="one_hour_caution" label="1時間足の注意点" :record="$record['one_hour_caution']"/>
    </div>
    <!-- 結果 -->
    <div id="result" class="tab-pane">

        <x-check-box name="result" label="結果" up-name="利確" down-name="損切" :record="$record['result']"/>
        <x-text name="risk" label="リスク" :record="$record['risk']"/>
        <x-text name="reward" label="リワード" :record="$record['reward']"/>
        <label for="">エントリー時間</label>
        <input type="datetime-local" name="entry_time" value="{{ $record['entry_time'] ? $record['entry_time']->format('Y-m-d\TH:i') : '' }}">
        <label for="">損切時間</label>
        <input type="datetime-local" name="loss_cut_time" value="{{ $record['entry_time'] ? $record['loss_cut_time']->format('Y-m-d\TH:i')  : '' }}">

        <x-textarea name="entry_basis" label="エントリー根拠" :record="$record['entry_basis']"/>
        <x-image name="entry_image_path" label="エントリ―時画像" :record="$record['entry_image_path']"/>
        <x-image name="finish_image_path" label="決済時画像" :record="$record['finish_image_path']"/>
        <x-text name="result_pips" label="獲得PIPS" :record="$record['result_pips']"/>
        <x-text name="result_profit" label="獲得金額" :record="$record['result_profit']"/>
        <x-textarea name="review" label="振り返り" :record="$record['review']"/>
    </div>
  </div>
  <div class="text-center">
    <button class="btn btn-info w-25">
        更新
    </button>
</form>
@endsection --}}

@extends('layouts.app')

@section('content')
<div id="record-create">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('record.update',$record) }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="font-weight-bold">通貨ペア</label>
            <select id="" class="form-control" name="currency_pair">
                <option value="" {{ $record['currency_pair'] == null ? 'selected' : '' }}>未選択</option>
                <option value="USDJPY" {{ $record['currency_pair'] == 'USDJPY' ? 'selected' : '' }}>USDJPY</option>
                <option value="EURUSD" {{ $record['currency_pair'] == 'EURUSD' ? 'selected' : '' }}>EURUSD</option>
                <option value="GBPUSD" {{ $record['currency_pair'] == 'GBPUSD' ? 'selected' : '' }}>GBPUSD</option>
            </select>
            
        </div>
        
        <div class="tab-wrap">
            <input id="TAB02-01" type="radio" name="TAB02" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB02-01">日足</label>
            <div class="tab-record-content">
                <div id="oneday" class="">
                    <x-check-box label="日足のトレンド方向" name="oneday_trend" :record="$record"/>
    
                    <div class="image_area">
                        <label for="oneday_image_path" class="font-weight-bold">日足の画像</label>
                        <div class="input-group form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="oneday_image_path">
                                <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary reset">取消</button>
                            </div>
                        </div>
                    </div> 
                    <x-textarea name="oneday_flow" label="日足の値動きの流れ" :record="$record"/>                
                    <x-textarea name="oneday_entry_point" label="日足のエントリーポイント" :record="$record"/>
                    <x-textarea name="oneday_profit_point" label="日足の利確位置" :record="$record"/>
                    <x-textarea name="oneday_caution" label="日足の注意点"  :record="$record"/>
                </div>
            </div>
            <input id="TAB02-02" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-02">4時間足</label>
            <div class="tab-record-content">
                <div id="four_hours" class="">
                <x-check-box label="4時間足のトレンド方向" name="four_hours_trend" :record="$record"/>
                <div class="image_area">
                    <label for="four_hours_image_path" class="font-weight-bold">4時間足の画像</label>
                    <div class="input-group form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="four_hours_image_path">
                            <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">取消</button>
                        </div>
                    </div>
                </div>
                <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ" :record="$record"/>
                <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント" :record="$record"/>
                <x-textarea name="four_hours_profit_point" label="4時間足の利確位置" :record="$record"/>
                <x-textarea name="four_hours_caution" label="4時間足の注意点" :record="$record"/>
            </div>
            </div>
            <input id="TAB02-03" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-03">1時間足</label>
            <div class="tab-record-content">
                <div id="one_hour" class="">
                    <x-check-box label="1時間足のトレンド方向" name="one_hour_trend" :record="$record"/>
                            
                <div class="image_area">
                    <label for="one_hour_image_path" class="font-weight-bold">1時間足の画像</label>
                    <div class="input-group form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="one_hour_image_path">
                            <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">取消</button>
                        </div>
                    </div>
                </div>
                <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ" :record="$record"/>
                <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント" :record="$record"/>
                <x-textarea name="one_hour_profit_point" label="1時間足の利確位置" :record="$record"/>
                <x-textarea name="one_hour_caution" label="1時間足の注意点" :record="$record"/>
            </div>
            </div>
            <input id="TAB02-04" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-04">結果</label>
            <div class="tab-record-content">
                <div id="result" class="">

                    <x-check-box label="結果" name="result" :record="$record" upName='利確' downName='損切'/>
                    
                <div class='form-group'>
                    <label for="risk" class="font-weight-bold">
                        リスク
                    </label>
                    <input type="text" name="risk" id="risk" class="form-control" value="1" readonly>
                </div>
                <!-- TODO：これはコントローラーでやるべき -->
                <div class="form-group">
                    <label for="" class="font-weight-bold">リワード</label>
                    <select id="" class="form-control" name="reward">
                        <option value="" {{ $record['reward'] == null ? 'selected' : '' }}>未選択</option>
                        @for ($i = 1; $i < 11; $i++)
                            @if($i == 1)
                            @continue
                            @endif
                            <option value="{{ $i }}" {{ $record['reward'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                
                <x-date-time name="entry_time" label="エントリー時間" :record="$record"/>
                <x-date-time name="loss_cut_time" label="損切時間" :record="$record"/>
                <x-textarea name="entry_basis" label="エントリー根拠" :record="$record"/>

                <div class="image_area">
                    <label for="entry_image_path" class="font-weight-bold">エントリ―時画像</label>
                    <div class="input-group form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="entry_image_path">
                            <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">取消</button>
                        </div>
                    </div>
                </div>

                <div class="image_area">
                    <label for="finish_image_path" class="font-weight-bold">決済時画像</label>
                    <div class="input-group form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="finish_image_path">
                            <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">取消</button>
                        </div>
                    </div>
                </div>

                <x-text name="result_pips" label="獲得PIPS" :record="$record"/>
                <x-text name="result_profit" label="獲得金額" :record="$record"/>
                <x-textarea name="review" label="振り返り" :record="$record"/>
            </div>
            </div>
        </div>
    <div class="text-center">
        <button class="btn btn-info w-25">更新</button>
    </div>
    </form>
</div>
@endsection
