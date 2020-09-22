
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
                <x-check-box label="日足のトレンド方向" name="oneday_trend" :record="$record"/>
                <x-image name='oneday_image_path' label='日足の画像' :record="$record"/>
                <x-textarea name="oneday_flow" label="日足の値動きの流れ" :record="$record"/>                
                <x-textarea name="oneday_entry_point" label="日足のエントリーポイント" :record="$record"/>
                <x-textarea name="oneday_profit_point" label="日足の利確位置" :record="$record"/>
                <x-textarea name="oneday_caution" label="日足の注意点"  :record="$record"/>
            </div>
            <input id="TAB02-02" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-02">4時間足</label>
            <div class="tab-record-content">
                <x-check-box label="4時間足のトレンド方向" name="four_hours_trend" :record="$record"/>
                <x-image name='four_hours_image_path' label='4時間足の画像' :record="$record"/>
                <x-textarea name="four_hours_flow" label="4時間足の値動きの流れ" :record="$record"/>
                <x-textarea name="four_hours_entry_point" label="4時間足のエントリーポイント" :record="$record"/>
                <x-textarea name="four_hours_profit_point" label="4時間足の利確位置" :record="$record"/>
                <x-textarea name="four_hours_caution" label="4時間足の注意点" :record="$record"/>
            </div>
            <input id="TAB02-03" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-03">1時間足</label>
            <div class="tab-record-content">
                <x-check-box label="1時間足のトレンド方向" name="one_hour_trend" :record="$record"/>
                <x-image name='one_hour_image_path' label='1時間足の画像' :record="$record"/>
                <x-textarea name="one_hour_flow" label="1時間足の値動きの流れ" :record="$record"/>
                <x-textarea name="one_hour_entry_point" label="1時間足のエントリーポイント" :record="$record"/>
                <x-textarea name="one_hour_profit_point" label="1時間足の利確位置" :record="$record"/>
                <x-textarea name="one_hour_caution" label="1時間足の注意点" :record="$record"/>
            </div>
            <input id="TAB02-04" type="radio" name="TAB02" class="tab-switch" /><label class="tab-label" for="TAB02-04">結果</label>
                <div class="tab-record-content">
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
                    <x-image name='entry_image_path' label='エントリ―時画像' :record="$record"/>
                    <x-image name='finish_image_path' label='決済時画像' :record="$record"/>
                    <x-text name="result_pips" label="獲得PIPS" :record="$record"/>
                    <x-text name="result_profit" label="獲得金額" :record="$record"/>
                    <x-textarea name="review" label="振り返り" :record="$record"/>
                </div>
            </div>
        <div class="text-center">
            <button class="btn btn-info w-25">更新</button>
        </div>
    </form>
</div>
@endsection
