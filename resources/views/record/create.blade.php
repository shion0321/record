@extends('layouts.app')

@section('content')

<form action="{{ route('record.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='form-group'>
        <label for="">
            通貨ペア
        </label>
        <input type="text" name="currency_pair" id="" class="form-control">
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

  <!-- 写真部分 -->
  <div class="tab-content">
    <div id="oneday" class="tab-pane active">
        <div>
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
                <input type="file" name="oneday_image_path" id="" class="form-control">
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
        </div>
    </div>
    <div id="four_hours" class="tab-pane">
        <div>
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
                <input type="file" name="four_hours_image_path" id="" class="form-control">
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
        </div>
    </div>
    <div id="one_hour" class="tab-pane">
        <div>
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
        <input type="file" name="one_hour_image_path" id="" class="form-control">
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
        </div>
    </div>
    <div id="result" class="tab-pane">
       <div>
            <div class='form-group'>
        <label for="">
            エントリ―時画像
        </label>
        <input type="file" name="entry_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            決済時画像
        </label>
        <input type="file" name="finish_image_path" id="" class="form-control">
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
       </div>
    </div>
  </div>

    <!--  -->
    {{-- <div>
        <label for="">
        </label>
        <input type="text" name="" id="">
    </div> --}}
    <!-- 通貨ペア -->
    {{-- <div class='form-group'>
        <label for="">
            通貨ペア
        </label>
        <input type="text" name="currency_pair" id="" class="form-control">
    </div> --}}
    {{-- <!-- 日足 -->
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
        <input type="file" name="oneday_image_path" id="" class="form-control">
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
    </div> --}}
    <!--  -->
    {{-- <div class='form-group'>
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
        <input type="file" name="four_hours_image_path" id="" class="form-control">
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
    </div> --}}
    <!--  -->
    {{-- <div class='form-group'>
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
        <input type="file" name="one_hour_image_path" id="" class="form-control">
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
    </div> --}}
    <!--  -->
    {{-- <div class='form-group'>
        <label for="">
            エントリ―時画像
        </label>
        <input type="file" name="entry_image_path" id="" class="form-control">
    </div>
    <!--  -->
    <div class='form-group'>
        <label for="">
            決済時画像
        </label>
        <input type="file" name="finish_image_path" id="" class="form-control">
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
    </div> --}}

    <div>
        <button>登録</button>
    </div>
</form>
@endsection
