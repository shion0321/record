<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency_pair' => 'required',
            'oneday_trend' => 'required',
            'four_hours_trend' => 'required',
            'one_hour_trend' => 'required',
            'oneday_flow' => 'required',
            'four_hours_flow' => 'required',
            'one_hour_flow' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'currency_pair.required'  => '通貨ペアを入力してください。',
            'oneday_trend.required'  => '日足のトレンドを入力してください。',
            'four_hours_trend.required'  => '4時間足のトレンドを入力してください。',
            'one_hour_trend.required'  => '1時間足のトレンドを入力してください。',
            'oneday_flow.required'  => '日足の値動きの流れを入力してください。',
            'four_hours_flow.required'  => '4時間足の値動きの流れを入力してください。',
            'one_hour_flow.required'  => '1時間足の値動きの流れを入力してください。',
        ];
    }
}
