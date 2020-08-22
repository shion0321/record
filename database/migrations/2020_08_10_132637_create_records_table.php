<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            # 主キー
            $table->bigIncrements('id');
            # ユーザーID
            $table->unsignedBigInteger('user_id');
            # 通貨ペア
            $table->string('currency_pair');
            /*
              日足
             */
            # 日足のトレンド方向
            $table->string('oneday_trend')->nullable();
            # 日足の画像
            $table->string('oneday_image_path')->nullable();
            # 日足の値動きの流れ
            $table->text('oneday_flow')->nullable();
            # 日足のエントリーポイント
            $table->string('oneday_entry_point')->nullable();
            # 日足の利確位置
            $table->string('oneday_profit_point')->nullable();
            # 日足の注意点
            $table->text('oneday_caution')->nullable();
            /*
            4時間足
             */
            # 4時間足のトレンド方向
            $table->string('four_hours_trend')->nullable();
            # 4時間足の画像
            $table->string('four_hours_image_path')->nullable();
            # 4時間足の値動きの流れ
            $table->text('four_hours_flow')->nullable();
            # 4時間足のエントリーポイント
            $table->string('four_hours_entry_point')->nullable();
            # 4時間足の利確位置
            $table->string('four_hours_profit_point')->nullable();
            # 4時間足の注意点
            $table->text('four_hours_caution')->nullable();
            /*
            1時間足
             */
            # 1時間足のトレンド方向
            $table->string('one_hour_trend')->nullable();
            # 1時間足の画像
            $table->string('one_hour_image_path')->nullable();
            # 1時間足の値動きの流れ
            $table->text('one_hour_flow')->nullable();
            # 1時間足のエントリーポイント
            $table->string('one_hour_entry_point')->nullable();
            # 1時間足の利確位置
            $table->string('one_hour_profit_point')->nullable();
            # 1時間足の注意点
            $table->text('one_hour_caution')->nullable();

            /* 決済 */
            # エントリ―時画像
            $table->string('entry_image_path')->nullable();
            # 決済時画像
            $table->string('finish_image_path')->nullable();
            # 結果
            $table->string('result')->nullable();
            # 獲得PIPS
            $table->integer('result_pips')->nullable();
            # 獲得金額
            $table->string('result_profit')->nullable();
            # 振り返り
            $table->text('review')->nullable();

            # 更新日、作成日
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
