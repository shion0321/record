@extends('layouts.app')

@section('content')
<div class="border rounded p-3">
    <form method="GET" action="{{ route('record.search') }}">
        <div class="font-weight-bold">通貨ペア</div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="checkbox" name="currency_pair[]" class="form-check-input" value="ポンドドル" id="gbpusd">
                <label for="gbpusd" class="form-check-label">ポンドドル</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="currency_pair[]" class="form-check-input" value="ユーロドル" id="eurusd">
                <label for="eurusd" class="form-check-label">ユーロドル</label>
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

            <button class="btn btn-info">検索</button>
        </div>
    </form>
</div>

<div class="text-right m-3">
    <a href="{{ route('record.create') }}" class="btn btn-info">新規作成</a>
</div>

<div>
    <table class="table">
        <th>作成日</th>
        <th>通貨ペア</th>
        <th>トレード結果</th>
        <th>更新日</th>
        @foreach ($records as $record)
            <tr>
                <td>
                    <a href="{{ route('record.show',$record) }}">
                        {{ $record->created_at->format('Y年m月d日') }}
                    </a>
                </td>

                <td>{{ $record->currency_pair }}</td>
                <td>
                    {{ $record->result ?? '未トレード' }}
                </td>
                <td>{{ $record->updated_at->format('Y年m月d日 h時i分') }}</td>

            </tr>
        @endforeach
    </table>
</div>
@endsection
