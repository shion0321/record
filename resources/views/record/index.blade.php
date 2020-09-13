@extends('layouts.app')

@section('content')
<div class="text-right mb-3">
    <a href="{{ route('record.create') }}" class="btn btn-primary">新規作成</a>
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
                        {{ $record->created_at->format('Y年m月d日') }}のチャート分析
                    </a>
                </td>

                <td>通貨ペア：{{ $record->currency_pair }}</td>
                <td>
                    {{ $record->result ?? '未トレード' }}
                </td>
                <td>更新日：{{ $record->updated_at->format('Y年m月d日 h時i分') }}</td>

            </tr>
        @endforeach
    </table>
</div>
@endsection
