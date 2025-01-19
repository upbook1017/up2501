<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'informessage' => 'required|between:0,300',
        ];
    }

    public function messages()
    {
        return [
            'informessage.required' => 'お問い合わせ内容は必ず入力してください。',
            'informessage.between' => 'お問い合わせ内容は0~300文字までです。',
        ];
    }
}
