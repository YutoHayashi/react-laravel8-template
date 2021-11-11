<?php

namespace App\Http\Requests\Web\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(  ) {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(  ) {
        return [
            'name' => [ 'required', 'string', 'max:50', 'min:4', ],
            'email' => [ 'required', 'max:255', 'email', 'unique:users,email', ],
            'password' => [ 'required', 'string', 'min:8', 'max:50', ],
            'is_admin' => [ 'unique:users,is_admin', ],
        ];
    }

    public function messages(  ) {
        return [
            'name.required' => '名前は必須項目です。',
            'name.string' => '名前は文字列を入力してください。',
            'name.max' => '名前は50文字までです。',
            'name.min' => '名前は4文字以上です。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.max' => 'メールアドレスは255文字までです。',
            'email.email' => 'メールアドレスのフォーマットではありません。',
            'email.unique' => 'このメールアドレスは既に使われています。',
            'password.required' => 'パスワードは必須項目です。',
            'password.string' => 'パスワードは文字列を入力してください。',
            'password.min' => 'パスワードは8文字以上です。',
            'password.max' => 'パスワードは50文字までです。',
            'is_admin.unique' => '管理者は既に存在します。',
        ];
    }
}
