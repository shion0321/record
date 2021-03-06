@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="d-flex">
            <div class="mr-2"><i class="fas fa-poll"></i>今月の勝率</div>
            <div>
                @if (isset($codes['rate']['month_win_rate']))
                    {{ $codes['rate']['month_win_rate'] }}%
                @else
                    未トレード
                @endif
            </div>
        </div>
        <div class="d-flex">
            <div class="mr-2"><i class="fas fa-dollar-sign"></i>今月の利益</div>
            <div>
                @if (isset($codes['result_profit']['month_profit']))
                    {{ $codes['result_profit']['month_profit'] }}円
                @else
                    0円
                @endif
            </div>
        </div>
    </div>
</div>

<div class="border rounded p-3">
    <form method="GET" action="{{ route('record.search') }}">
        <div class="font-weight-bold">通貨ペア</div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="checkbox" name="currency_pair[]" class="form-check-input" value="USDJPY" id="usdjpy">
                <label for="usdjpy" class="form-check-label">USDJPY</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="currency_pair[]" class="form-check-input" value="EURUSD" id="eurusd">
                <label for="eurusd" class="form-check-label">EURUSD</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="currency_pair[]" class="form-check-input" value="GBPUSD" id="gbpusd">
                <label for="gbpusd" class="form-check-label">GBPUSD</label>
            </div>
        </div>
        <div class="font-weight-bold">結果</div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="checkbox" name="result[]" class="form-check-input" value="利確" id="win">
                <label for="win" class="form-check-label">利確</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="result[]" class="form-check-input" value="損切" id="losscut">
                <label for="losscut" class="form-check-label">損切</label>
            </div>
        </div>
        <div class="text-center">

            <button class="btn btn-info"><span><i class="fas fa-search"></i></span> 検索</button>
        </div>
    </form>
</div>

{{-- <div class="text-right m-3">
    <a href="{{ route('record.create') }}" class="btn btn-info">新規作成</a>
</div> --}}

<div>
    <table class="table">
        <th><i class="fas fa-calendar-week"></i>作成日</th>
        <th><i class="fas fa-yen-sign"></i>通貨ペア</th>
        <th class="text-center"><i class="fas fa-poll-h"></i>トレード結果</th>
        <th class="text-center"><i class="fas fa-exclamation-triangle"></i>リスク / <i class="fas fa-gift"></i>リワード</th>
        {{-- <th>更新日</th> --}}
        @foreach ($records as $record)
            <tr>
                <td>
                    <a href="{{ route('record.show',$record) }}">
                        {{ $record->created_at->format('Y年m月d日') }}
                    </a>
                </td>

                <td>{{ $record->currency_pair }}</td>
                <td class="text-center">
                    @if (!isset($record->result))
                        {{ $record->result ?? '未トレード' }}
                    @elseif($record->result == '損切')
                        <div class="result-losscut">
                            {{ $record->result }}
                        </div>
                    @elseif($record->result == '利確')
                        <div class="">
                            {{ $record->result }}
                        </div>
                    @endif
                </td>
                <td class="text-center">{{ $record->risk ?? '' }}：{{ $record->reward ?? '' }}</td>
                {{-- <td>{{ $record->updated_at->format('Y年m月d日 H時i分') }}</td> --}}
            </tr>
        @endforeach
    </table>
</div>
@endsection
