<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Record extends Model
{
    protected $fillable = [

        'currency_pair',
        'oneday_trend',
        'oneday_image_path',

        'oneday_flow',

        'oneday_entry_point',

        'oneday_profit_point',

        'oneday_caution',
        /*
        4時間足
            */

        'four_hours_trend',

        'four_hours_image_path',

        'four_hours_flow',

        'four_hours_entry_point',

        'four_hours_profit_point',

        'four_hours_caution',
        /*
        1時間足
            */

        'one_hour_trend',

        'one_hour_image_path',

        'one_hour_flow',

        'one_hour_entry_point',

        'one_hour_profit_point',

        'one_hour_caution',

        /* 決済 */
        # エントリ―時
        'entry_image_path',
        # 決済時
        'finish_image_path',
        # 結果
        'result',
        # 獲得PIPS
        'result_pips',
        # 獲得金額
        'result_profit',
        # 振り返り
        'review',
        'entry_time',
        'loss_cut_time',
        'entry_basis',
        'risk',
        'reward',
    ];

    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOwnRecords($query)
    {
        return $query->where('user_id', Auth::id())
            ->get();
    }

    public static function is_my_record($record_id)
    {

        $record = self::where('id', $record_id)
            ->where('user_id', Auth::id())
            ->first();

        return $record;
    }

    public function getCurrencyPairNameAttribute()
    {
    }
}
