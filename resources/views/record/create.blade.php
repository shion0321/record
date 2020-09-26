
@extends('layouts.app')

@section('content')
<div id="record-create">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="align-middle">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('record.store') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        <x-select name='currency_pair' label='通貨ペア' :record="$codes"/>
                
        <div class="tab-wrap">
            <input id="TAB02-01" type="radio" name="TAB02" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB02-01">日足</label>
            <div class="tab-record-content">
                <x-check-box label="日足のトレンド方向" name="oneday_trend" />
                <x-image name='oneday_image_path' label='日足の画像' />
                <x-textarea name="oneday_flow" label="日足の値動きの流れ" />                
                <x-textarea name="oneday_entry_point" label="日足のエントリーポイント" />
                <x-textarea name="oneday_profit_point" label="日足の利確位置" />
                <x-textarea name="oneday_caution" label="日足の注意点"  />
            </div>
            <input id="TAB02-02" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-02">4時間足</label>
            <div class="tab-record-content">
                <x-check-box label="4時間足のトレンド方向" name="four_hours_trend" />
                <x-image name='four_hours_image_path' label='4時間足の画像' />
                <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ" />
                <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント" />
                <x-textarea name="four_hours_profit_point" label="4時間足の利確位置" />
                <x-textarea name="four_hours_caution" label="4時間足の注意点" />
            </div>
            <input id="TAB02-03" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-03">1時間足</label>
            <div class="tab-record-content">
                <x-check-box label="1時間足のトレンド方向" name="one_hour_trend" />
                <x-image name='one_hour_image_path' label='1時間足の画像' />
                <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ" />
                <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント" />
                <x-textarea name="one_hour_profit_point" label="1時間足の利確位置" />
                <x-textarea name="one_hour_caution" label="1時間足の注意点" />
            </div>
            <input id="TAB02-04" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-04">結果</label>
                <div class="tab-record-content">
                    <x-check-box label="結果" name="result"  upName='利確' downName='損切'/>
                    <div class='form-group'>
                        <label for="risk" class="font-weight-bold">
                            リスク
                        </label>
                        <input type="text" name="risk" id="risk" class="form-control" value="1" readonly>
                    </div>

                    <x-select name='reward' label='リワード' :record="$codes"/>

                    <x-date-time name="entry_time" label="エントリー時間" />
                    <x-date-time name="loss_cut_time" label="損切時間" />
                    <x-textarea name="entry_basis" label="エントリー根拠" />
                    <x-image name='entry_image_path' label='エントリ―時画像' />
                    <x-image name='finish_image_path' label='決済時画像' />
                    <x-text name="result_pips" label="獲得PIPS" />
                    <x-text name="result_profit" label="獲得金額" />
                    <x-text name="loss_amount" label="損失額" />
                    <x-textarea name="review" label="振り返り" />
                    <x-textarea name="loss_amount_reason" label="損失理由の考察" />
                </div>
            </div>
        <div class="text-center">
            <button class="btn btn-info w-25">登録</button>
        </div>
    </form>
</div>
@endsection
