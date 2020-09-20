@extends('layouts.app')

@section('content')

<div class="btn-group float-right mb-3">
    <a href="{{ route('record.edit',$record) }}" class="btn btn-info">編集</a>
    <form action="{{ route('record.destroy',$record) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" id="" value="削除" class="btn btn-danger ml-1">
    </form>
</div>

<div class="tab-content">
    <table class="table">
        <tr>
            <th>作成日</th>
            <td>{{ $record->created_at->format('Y年m月d日') }}</td>
        </tr>
        <tr>
            <th>通貨ペア</th>
            <td>{{ $record->currency_pair ??'' }}</td>
        </tr>
    </table>

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
        <!-- 日足 -->
        <div id="oneday" class="tab-pane active">
            <table class="table">
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
            </table>
        </div>

        <!-- 4時間足 -->
        <div id="four_hours" class="tab-pane">
            <table class="table">
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
            </table>
        </div>
        <!-- 1時間足 -->
        <div id="one_hour" class="tab-pane">
            <table class="table">

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
            </table>
        </div>
        <!-- 結果 -->
        <div id="result" class="tab-pane">
            <table class="table">

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

    {{-- </table> --}}
</div>

@endsection
