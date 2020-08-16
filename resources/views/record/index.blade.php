@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('record.create') }}" class="btn">新規作成</a>
</div>

<div>
    <table class="table">
        @foreach ($records as $record)
            <tr>
                <th><a href="{{ route('record.show',$record) }}">ID：{{ $record->id }}</a></th>
                <td>通貨ペア：{{ $record->currency_pair }}</td>
                <td>更新日：{{ $record->updated_at }}</td>
                <td>
                    <a href="{{ route('record.edit',$record) }}">編集</a>
                    <form action="{{ route('record.destroy',$record) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" id="" value="削除" class="btn">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
