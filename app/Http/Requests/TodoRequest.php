<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            // contentは入力必須かつ20文字以内
            'content' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'タスク名を入力してね',
            'content.max' => '20文字以内におさめてね',
        ];
    }
}
