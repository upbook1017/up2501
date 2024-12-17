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
        if ($this->has('posts')) { // BoardController用のバリデーション（posts配列がある場合(post.〇〇(postsキーが含まれている場合。))）
            return [
                'title' => 'required|between:0,20',
                //'posts.name' => 'required|between:0,20',  //'name'はデフォルト値を設定したため、コメントアウト。
                'posts.message' => 'required|between:0,100',
            ];
        } else {   // PostController用のバリデーション（posts配列がない場合(postsキーが含まれていない場合。)）
            return [
                //'name' => 'required|between:0,20',  //'name'はデフォルト値を設定したため、コメントアウト。
                'message' => 'required|between:0,100',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトル名は必ず入力してください。',
            'title.between' => 'タイトル名は0~20文字までです。',
            /*'posts.name.required' => '名前は必ず入力してください。',*/  //'name'はデフォルト値を設定したため、コメントアウト。
            'posts.name.between' => '名前は0~20文字までです。',
            /*'name.required' => '名前は必ず入力してください。', */  //'name'はデフォルト値を設定したため、コメントアウト。
            'name.between' => '名前は0~20文字までです。',
            'posts.message.required' => '投稿内容は必ず入力してください。',
            'posts.message.between' => '投稿内容は0~100文字までです。',
            'message.required' => '投稿内容は必ず入力してください。',
            'message.between' => '投稿内容は0~100文字までです。',
        ];
    }
}
