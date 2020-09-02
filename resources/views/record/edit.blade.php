{{-- @extends('layouts.app')

@section('content') --}}

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
    <div class="form-group">
        <label for="">通貨ペア</label>
        <select id="" class="form-control" name="currency_pair">
            <option value="" selected @if(old('currency_pair')=='') selected  @endif>未選択</option>
            <option value="ポンドドル" {{ old('currency_pair') =='ポンドドル'? 'selected' : ''}} {{ $record['currency_pair'] =='ポンドドル'? 'selected' : ''}}>ポンドドル</option>
            <option value="ユーロドル" {{ old('currency_pair') =='ユーロドル'? 'selected' : ''}} {{ $record['currency_pair'] =='ユーロドル'? 'selected' : ''}}>ユーロドル</option>
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
        <x-check-box label="日足のトレンド方向" name="oneday_trend" up-name="上昇トレンド" down-name="下降トレンド"/>
        <x-image name="oneday_image_path" label="日足の画像"/>
        <x-textarea name="oneday_flow" label="日足の値動きの流れ" record="{{ $record['id'] }}"/>
        <x-textarea name="oneday_entry_point" label="日足のエントリーポイント"/>
        <x-textarea name="oneday_profit_point" label="日足の利確位置"/>
        <x-textarea name="oneday_caution" label="日足の注意点"/>
    </div>
    <!-- 4時間足 -->
    <div id="four_hours" class="tab-pane">
        <x-check-box name="four_hours_trend" label="4時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/>
        <x-image name="four_hours_image_path" label="4時間足の画像"/>
        <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ"/>
        <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント"/>
        <x-textarea name="four_hours_profit_point" label="4時間足の利確位置"/>
        <x-textarea name="four_hours_caution" label="4時間足の注意点"/>
    </div>
    <!-- 1時間足 -->
    <div id="one_hour" class="tab-pane">
        <x-check-box name="one_hour_trend" label="1時間足のトレンド方向" up-name="上昇トレンド" down-name="下降トレンド"/>
        <x-image name="one_hour_image_path" label="1時間足の画像" />
        <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ"/>
        <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント"/>
        <x-textarea name="one_hour_profit_point" label="1時間足の利確位置"/>
        <x-textarea name="one_hour_caution" label="1時間足の注意点"/>
    </div>
    <!-- 結果 -->
    <div id="result" class="tab-pane">

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
    </div>
  </div>
<div><button class="btn btn-primary">登録</button></div>
</form>
@endsection


{{-- <form action="{{ route('record.update',$record) }}" method="POST" enctype="multipart/form-data">
    @method('PUTCH')
    @csrf

    <!-- 通貨ペア -->
    <div class='form-group'>
        <label for="">
            通貨ペア
        </label>
        <input type="text" name="currency_pair" id="" class="form-control" value="{{ $record->currency_pair ?? ''}}">
    </div>
    <!-- 日足 -->
    <div class='form-group'>
        <label for="">
            日足のトレンド方向
        </label>
        <input type="text" name="oneday_trend" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            日足の画像
        </label>
        <input type="text" name="oneday_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            日足の値動きの流れ
        </label>
        <input type="text" name="oneday_flow" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            日足のエントリーポイント
        </label>
        <input type="text" name="oneday_entry_point" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            日足の利確位置
        </label>
        <input type="text" name="oneday_profit_point" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            日足の注意点
        </label>
        <input type="text" name="oneday_caution" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足のトレンド方向
        </label>
        <input type="text" name="four_hours_trend" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足の画像
        </label>
        <input type="text" name="four_hours_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足の値動きの流れ
        </label>
        <input type="text" name="four_hours_flow" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足のエントリーポイント
        </label>
        <input type="text" name="four_hours_entry_point" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足の利確位置
        </label>
        <input type="text" name="four_hours_profit_point" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            4時間足の注意点
        </label>
        <input type="text" name="four_hours_caution" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            1時間足のトレンド方向
        </label>
        <input type="text" name="one_hour_trend" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            1時間足の画像
        </label>
        <input type="text" name="one_hour_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            1時間足の値動きの流れ
        </label>
        <input type="text" name="one_hour_flow" id="" class="form-control">
    </div><!--  -->
    <div class='form-group'>
        <label for="">
            1時間足のエントリーポイント
        </label>
        <input type="text" name="one_hour_entry_point" id="" class="form-control">
    </div><!--  -->
    <div class='form-group'>
        <label for="">
            1時間足の利確位置
        </label>
        <input type="text" name="one_hour_profit_point" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            1時間足の注意点
        </label>
        <input type="text" name="one_hour_caution" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            エントリ―時画像
        </label>
        <input type="text" name="entry_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            決済時画像
        </label>
        <input type="text" name="finish_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            結果
        </label>
        <input type="text" name="result" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            獲得PIPS
        </label>
        <input type="text" name="result_pips" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            獲得金額
        </label>
        <input type="text" name="result_profit" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            振り返り
        </label>
        <input type="text" name="review" id="" class="form-control">
    </div>

    <div>
        <button>更新</button>
    </div>
</form> --}}
{{-- @endsection --}}
