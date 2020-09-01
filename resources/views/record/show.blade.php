@extends('layouts.app')

@section('content')

<div>
    <table class="table">
        <tr>
            <th>作成日</th>
            <td>{{ $record->created_at->format('Y年m月d日') }}</td>
        </tr>
        <tr>
            <th>通貨ペア</th>
            <td>{{ $record->currency_pair ??'' }}</td>
        </tr>
        <!-- 日足 -->
        <tr>
            <th>日足トレンド方向</th>
            <td>{{ $record->oneday_trend ??''  }}</td>
        </tr>
        <tr>
            <th>日足画像</th>
            <td><img src="{{ $record->oneday_image_path ??'' }}" alt="" class="img-fluid"></td>
        </tr>
        <tr>
            <th>日足の流れ</th>
            <td>{{ $record->oneday_flow ??'' }}</td>
        </tr>
        <tr>
            <th>日足のエントリーポイント</th>
            <td>{{ $record->oneday_entry_point ??'' }}</td>
        </tr>
        <tr>
            <th>日足の利確位置</th>
            <td>{{ $record->oneday_profit_point ??'' }}</td>
        </tr>
        <tr>
            <th>日足の注意点</th>
            <td>{{ $record->oneday_caution ??'' }}</td>
        </tr>
        <!-- 4時間足 -->
        <tr>
            <th>4時間足トレンド方向</th>
            <td>{{ $record->four_hours_trend ??''  }}</td>
        </tr>
        <tr>
            <th>4時間足画像</th>
            <td><img src="{{ $record->four_hours_image_path ??'' }}" alt=""></td>
        </tr>
        <tr>
            <th>4時間足の流れ</th>
            <td>{{ $record->four_hours_flow ??'' }}</td>
        </tr>
        <tr>
            <th>4時間足のエントリーポイント</th>
            <td>{{ $record->four_hours_entry_point ??'' }}</td>
        </tr>
        <tr>
            <th>4時間足の利確位置</th>
            <td>{{ $record->four_hours_profit_point ??'' }}</td>
        </tr>
        <tr>
            <th>4時間足の注意点</th>
            <td>{{ $record->four_hours_caution ??'' }}</td>
        </tr>
        <!-- 1時間足 -->
        <tr>
            <th>1時間足トレンド方向</th>
            <td>{{ $record->one_hour_trend ??''  }}</td>
        </tr>
        <tr>
            <th>1時間足画像</th>
            <td><img src="{{ $record->one_hour_image_path ??'' }}" alt=""></td>
        </tr>
        <tr>
            <th>1時間足の流れ</th>
            <td>{{ $record->one_hour_flow ??'' }}</td>
        </tr>
        <tr>
            <th>1時間足のエントリーポイント</th>
            <td>{{ $record->one_hour_entry_point ??'' }}</td>
        </tr>
        <tr>
            <th>1時間足の利確位置</th>
            <td>{{ $record->one_hour_profit_point ??'' }}</td>
        </tr>
        <tr>
            <th>1時間足の注意点</th>
            <td>{{ $record->one_hour_caution ??'' }}</td>
        </tr>
        <!-- 結果 -->
        <tr>
            <th>結果</th>
            <td>{{ $record->result ??''  }}</td>
        </tr>
        <tr>
            <th>リスク</th>
            <td>{{ $record->risk ??''  }}</td>
        </tr>
        <tr>
            <th>リワード</th>
            <td>{{ $record->reward ??''  }}</td>
        </tr>
        <tr>
            <th>エントリー時間</th>
            <td>{{ $record->entry_time ??''  }}</td>
        </tr>
        <tr>
            <th>損切時間</th>
            <td>{{ $record->loss_cut_time ??''  }}</td>
        </tr>
        <tr>
            <th>エントリー根拠</th>
            <td>{{ $record->entry_basis ??''  }}</td>
        </tr>

        <tr>
            <th>エントリー時画像</th>
            <td><img src="{{ $record->entry_image_path ??'' }}" alt=""></td>
        </tr>
        <tr>
            <th>決済時画像</th>
            <td><img src="{{ $record->finish_image_path ??'' }}" alt=""></td>
        </tr>
        <tr>
            <th>獲得PIPS</th>
            <td>{{ $record->result_pips ??'' }}</td>
        </tr>
        <tr>
            <th>獲得利益</th>
            <td>{{ $record->result_profit ??'' }}</td>
        </tr>
        <tr>
            <th>振り返り</th>
            <td>{{ $record->review ??'' }}</td>
        </tr>

    </table>
</div>

@endsection
