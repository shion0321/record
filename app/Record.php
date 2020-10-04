<?php

namespace App;

use Carbon\Carbon;
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
        'loss_amount',
        'loss_amount_reason',
    ];

    protected $dates = [
        'loss_cut_time',
        'entry_time',
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
        ->latest()
            ->get();
    }

    public static function is_my_record($record_id)
    {

        $record = self::where('id', $record_id)
            ->where('user_id', Auth::id())
            ->first();

        return $record;
    }

    public static function get_currency_pair_codes($_form = false)
    {
        $codes = [];

        if ($_form == true) {
            $codes[''] = '未選択';
        }
        $codes['USDJPY'] = 'USDJPY';
        $codes['EURUSD'] = 'EURUSD';
        $codes['GBPUSD'] = 'GBPUSD';

        return $codes;
    }

    public static function get_reward_codes($_form = false)
    {
        $codes = [];

        if ($_form == true) {
            $codes[''] = '未選択';
        }

        for ($i=1; $i < 11; $i++) {

            if ($i == 1) {
                continue;
            }
            $codes[$i] = $i;
        }

        return $codes;
    }

    public static function get_trend_codes($_form = false)
    {
        $codes = [];

        if ($_form == true) {
            $codes[''] = '未選択';
        }
        $codes['上昇トレンド'] = '上昇トレンド';
        $codes['下降トレンド'] = '下降トレンド';

        return $codes;
    }

    public static function get_result_codes($_form = false)
    {
        $codes = [];

        if ($_form == true) {
            $codes[''] = '未選択';
        }
        $codes['利確'] = '利確';
        $codes['損切'] = '損切';

        return $codes;
    }

    public static function _calculate_win_rate($user_id)
    {
        $rate = [];
		$rate['month_win_rate'] = '';

        # 今月の利確数(TODO:scope)
        $month_win_query = self::query();
        $month_win_query
        ->where('user_id', $user_id)
        ->where('result', '利確')
        ->whereBetween('entry_time', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()]);

        # 今月の損切数(TODO:scope)
        $month_fail_query = self::query();
        $month_fail_query
        ->where('result', '損切')
        ->where('user_id', $user_id)
        ->whereBetween('entry_time', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()]);

        # 利確数
        $month_win_count = count($month_win_query->getModels());
        # 損切数
        $month_fail_count = count($month_fail_query->getModels());
        # 結果の総数（今月）
        $month_all_count = $month_win_count + $month_fail_count;

        # 未トレード
        if ($month_all_count == 0) {

            $rate['month_win_rate'] = null;

        } else {
            $rate['month_win_rate'] = $month_win_count / $month_all_count * 100;
        }


        return $rate;
    }

    public static function _calculate_result_profit($user_id)
    {
        $result_profit = [];
        $month_profit = null;
        $month_loss = null;
        $month_models = null;
        // $money['year_earn_money'] = '';
        // $result_profit['month_result_profit'] = null;
        // $money['week_earn_money'] = '';

        $query = self::query();
        $query->where('user_id',$user_id);
        $query->whereNotNull('result_profit');
        $base_query = $query;

        // 今年のモデル
        // $year_query = $base_query->whereBetween('entry_time', [Carbon::now()->firstOfYear()->toDateString(), Carbon::now()->endOfYear()->toDateString()])->getModels();
        # 今月のモデル
        $month_models = $base_query->whereBetween('entry_time', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])->getModels();


        foreach ($month_models as $model) {

            $month_profit += (int)$model->result_profit;
            $month_loss += (int)$model->loss_amount;
        }



        $result_profit['month_earn_money'] = $month_profit;
        $result_profit['month_loss'] = $month_loss;
        $result_profit['month_profit'] = $month_profit - $month_loss;

        # エントリー時間が今年のモデルを取得
        # エントリー時間が今月のモデルを取得
        # エントリー時間が今週のモデルを取得

        return $result_profit;
    }

    public static function _calculate_get_pips($user_id)
    {
        $pips = [];
        $month_pips_count = null;
        $pips['month_get_pips'] = '';

        $query = self::query();
        $query->where('user_id', $user_id);
        $query->where('result', '利確');
        $query->whereBetween('entry_time', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()]);

        $models = $query->getModels();

        foreach ($models as $model) {
            $month_pips_count += intval($model->result_pips);
        }

        $pips['month_get_pips'] = $month_pips_count;

        return $pips;
    }
}
