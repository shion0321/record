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
    
    <form action="{{ route('record.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="font-weight-bold">通貨ペア</label>
            <select id="" class="form-control" name="currency_pair">
                <option value="" selected @if(old('currency_pair')=='') selected  @endif>未選択</option>
                <option value="ユーロドル" {{ old('currency_pair') =='USDJPY'? 'selected' : ''}}>USDJPY</option>
                <option value="ユーロドル" {{ old('currency_pair') =='EURUSD'? 'selected' : ''}}>EURUSD</option>
                <option value="ポンドドル" {{ old('currency_pair') =='GBPUSD'? 'selected' : ''}}>GBPUSD</option>
            </select>
            
        </div>
        
        <div class="tab-wrap">
            <input id="TAB02-01" type="radio" name="TAB02" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB02-01">日足</label>
            <div class="tab-record-content">
                <div id="oneday" class="">
        
        
            <div class="form-group">
                <label class="font-weight-bold">
                    日足のトレンド方向
                </label> 
                <div class="inline-radio">
                    <div><input type="radio" name="oneday_trend" value="上昇トレンド"><label>上昇トレンド</label></div>
                    <div><input type="radio" name="oneday_trend" value="下降トレンド"><label>下降トレンド</label></div>
                </div>
            </div>
        
        
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
                {{-- <x-check-box label="日足のトレンド方向" name="oneday_trend" up-name="上昇トレンド" down-name="下降トレンド"/> --}}
                {{-- <x-image name="oneday_image_path" label="日足の画像"/> --}}
                <x-textarea name="oneday_flow" label="日足の値動きの流れ"/>
                <x-textarea name="oneday_entry_point" label="日足のエントリーポイント"/>
                <x-textarea name="oneday_profit_point" label="日足の利確位置"/>
                <x-textarea name="oneday_caution" label="日足の注意点"/>
            </div>
            </div>
            <input id="TAB02-02" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-02">4時間足</label>
            <div class="tab-record-content">
                <div id="four_hours" class="">
                    <div class="form-group">
                        <label class="font-weight-bold">
                            4時間足のトレンド方向
                        </label> 
                        <div class="inline-radio">
                            <div><input type="radio" name="four_hours_trend" value="上昇トレンド"><label>上昇トレンド</label></div>
                            <div><input type="radio" name="four_hours_trend" value="下降トレンド"><label>下降トレンド</label></div>
                        </div>
                    </div>
                {{-- <x-check-box name="four_hours_trend" label="4時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/> --}}
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
                {{-- <x-image name="four_hours_image_path" label="4時間足の画像"/> --}}
                <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ"/>
                <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント"/>
                <x-textarea name="four_hours_profit_point" label="4時間足の利確位置"/>
                <x-textarea name="four_hours_caution" label="4時間足の注意点"/>
            </div>
            </div>
            <input id="TAB02-03" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-03">1時間足</label>
            <div class="tab-record-content">
                <div id="one_hour" class="">
                    
                    <div class="form-group">
                        <label class="font-weight-bold">
                            1時間足のトレンド方向
                        </label> 
                        <div class="inline-radio">
                            <div><input type="radio" name="one_hour_trend" value="上昇トレンド"><label>上昇トレンド</label></div>
                            <div><input type="radio" name="one_hour_trend" value="下降トレンド"><label>下降トレンド</label></div>
                        </div>
                    </div>
    
                {{-- <x-check-box name="one_hour_trend" label="1時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/> --}}

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

                {{-- <x-image name="one_hour_image_path" label="1時間足の画像" /> --}}
                <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ"/>
                <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント"/>
                <x-textarea name="one_hour_profit_point" label="1時間足の利確位置"/>
                <x-textarea name="one_hour_caution" label="1時間足の注意点"/>
            </div>
            </div>
            <input id="TAB02-04" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-04">結果</label>
            <div class="tab-record-content">
                <div id="result" class="">
        
                    <div class="form-group">
                        <label class="font-weight-bold">
                            結果
                        </label> 
                        <div class="inline-radio">
                            <div><input type="radio" name="result" value="利確"><label>利確</label></div>
                            <div><input type="radio" name="result" value="損切"><label>損切</label></div>
                        </div>
                    </div>
    
                {{-- <x-check-box name="result" label="結果" up-name="利確" down-name="損切"/> --}}
                {{-- <x-text name="risk" label="リスク"/> --}}
                
                <div class='form-group'>
                    <label for="risk" class="font-weight-bold">
                        リスク
                    </label>
                    <input type="text" name="risk" id="risk" class="form-control" value="1" readonly>
                </div>
                <x-text name="reward" label="リワード"/>
    
                <div class='form-group'>
                    <label for="entry_time" class="font-weight-bold">
                        エントリー時間
                    </label>
                    <input type="datetime-local" name="entry_time" id="entry_time" class="form-control">
                </div>
    
                <div class='form-group'>
                    <label for="loss_cut_time" class="font-weight-bold">
                        損切時間
                    </label>
                    <input type="datetime-local" name="loss_cut_time" id="loss_cut_time" class="form-control">
                </div>
    
                {{-- <label for="">エントリー時間</label>
                <input type="datetime-local" name="entry_time"> --}}
                {{-- <label for="">損切時間</label>
                <input type="datetime-local" name="loss_cut_time"> --}}
        
                <x-textarea name="entry_basis" label="エントリー根拠"/>

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

                {{-- <x-image name="entry_image_path" label="エントリ―時画像" /> --}}

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

                {{-- <x-image name="finish_image_path" label="決済時画像" /> --}}
                <x-text name="result_pips" label="獲得PIPS"/>
                <x-text name="result_profit" label="獲得金額"/>
                <x-textarea name="review" label="振り返り"/>
            </div>
            </div>
        </div>
        {{-- <ul class="nav nav-tabs">
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
        </ul> --}}
    
      {{-- <div class="tab-content"> --}}
        <!-- 日足 -->
        {{-- <div id="oneday" class="tab-pane active">
    
    
        <div class="font-weight-bold">日足のトレンド方向</div>
        <div class="inline-radio">
            <div><input type="radio" name="oneday_trend" value="上昇トレンド"><label>上昇トレンド</label></div>
            <div><input type="radio" name="oneday_trend" value="下降トレンド"><label>下降トレンド</label></div>
        </div>
    
    
    
            <x-check-box label="日足のトレンド方向" name="oneday_trend" up-name="上昇トレンド" down-name="下降トレンド"/>
            <x-image name="oneday_image_path" label="日足の画像"/>
            <x-textarea name="oneday_flow" label="日足の値動きの流れ"/>
            <x-textarea name="oneday_entry_point" label="日足のエントリーポイント"/>
            <x-textarea name="oneday_profit_point" label="日足の利確位置"/>
            <x-textarea name="oneday_caution" label="日足の注意点"/>
        </div> --}}
        <!-- 4時間足 -->
        {{-- <div id="four_hours" class="tab-pane">
            <x-check-box name="four_hours_trend" label="4時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/>
            <x-image name="four_hours_image_path" label="4時間足の画像"/>
            <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ"/>
            <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント"/>
            <x-textarea name="four_hours_profit_point" label="4時間足の利確位置"/>
            <x-textarea name="four_hours_caution" label="4時間足の注意点"/>
        </div> --}}
        <!-- 1時間足 -->
        {{-- <div id="one_hour" class="tab-pane">
            <x-check-box name="one_hour_trend" label="1時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/>
            <x-image name="one_hour_image_path" label="1時間足の画像" />
            <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ"/>
            <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント"/>
            <x-textarea name="one_hour_profit_point" label="1時間足の利確位置"/>
            <x-textarea name="one_hour_caution" label="1時間足の注意点"/>
        </div> --}}
        <!-- 結果 -->
        {{-- <div id="result" class="tab-pane">
    
            <x-check-box name="result" label="結果" up-name="利確" down-name="損切"/>
            <x-text name="risk" label="リスク"/>
            <x-text name="reward" label="リワード"/>
            <label for="">エントリー時間</label>
            <input type="datetime-local" name="entry_time">
            <label for="">損切時間</label>
            <input type="datetime-local" name="loss_cut_time">
    
            <x-textarea name="entry_basis" label="エントリー根拠"/>
            <x-image name="entry_image_path" label="エントリ―時画像" />
            <x-image name="finish_image_path" label="決済時画像" />
            <x-text name="result_pips" label="獲得PIPS"/>
            <x-text name="result_profit" label="獲得金額"/>
            <x-textarea name="review" label="振り返り"/>
        </div> --}}
      {{-- </div> --}}
    <div class="text-center">
        <button class="btn btn-info w-25">登録</button>
    </div>
    </form>
</div>
@endsection
