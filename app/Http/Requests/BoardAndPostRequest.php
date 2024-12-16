<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardAndPostRequest extends FormRequest
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
            'title' => 'required|between:0,20',
            'posts.name' => 'required|between:0,20',
            'posts.message' => 'required|between:0,100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトル名は必ず入力してください。',
            'title.between' => 'タイトル名は0~20文字までです。',
            'posts.name.required' => '名前は必ず入力してください。',
            'posts.name.between' => '名前は0~20文字までです。',
            'posts.message.required' => '投稿内容は必ず入力してください。',
            'posts.message.between' => '投稿内容は0~100文字までです。',
        ];
    }
}
