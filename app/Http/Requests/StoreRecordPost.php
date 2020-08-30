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
            'oneday_flow' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'currency_pair.required'  => '通貨ペアを入力してください。',
            'oneday_flow.required'  => '日足の値動きの流れを入力してください。',
        ];
    }
}
