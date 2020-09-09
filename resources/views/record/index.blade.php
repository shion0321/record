@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <a href="{{ route('record.create') }}" class="btn btn-primary btn-block">新規作成</a>
</div>

<div>
    <table class="table">
        @foreach ($records as $record)
            <tr>
                <td>
                    <a href="{{ route('record.show',$record) }}">
                        {{ $record->created_at->format('Y年m月d日') }}のチャート分析
                    </a>
                </td>

                <td>通貨ペア：{{ $record->currency_pair }}</td>
                <td>更新日：{{ $record->updated_at->format('Y年m月d日 h時i分') }}</td>
                <td>
                    <div class="row">
                        {{-- <div>
                            <a href="{{ route('record.edit',$record) }}" class="btn btn-primary">編集</a>
                        </div>
                        <div>
                            <form action="{{ route('record.destroy',$record) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="" value="削除" class="btn btn-danger ml-1">
                            </form>
                        </div> --}}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
