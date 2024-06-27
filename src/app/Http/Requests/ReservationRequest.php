<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');

        return [
            'shop_id' => 'required|exists:shops,id',
            'date' => ['required', 'date', 'after_or_equal:' . $tomorrow],
            'time' => 'required|date_format:H:i',
            'number_of_people' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください。',
            'date.date' => '有効な日付を入力してください。',
            'date.after_or_equal' => '予約日は明日以降の日付を指定してください。',
            'time.required' => '時間を入力してください。',
            'time.date_format' =>
            '時間は「時:分」の形式で入力してください（例、14:30）。',
            'number_of_people.required' => '人数を入力してください。',
            'number_of_people.integer' =>
            '人数は半角数字で入力してください。',
            'number_of_people.min' => '人数は最低1人からです。',
            'number_of_people.max' => '人数は最大で10人までです。',
        ];
    }
}
