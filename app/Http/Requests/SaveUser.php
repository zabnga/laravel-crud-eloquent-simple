<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUser extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = !empty($this->route('user')->id) ? $this->route('user')->id : '';  //ok pakai (user $user)

        $rules = array(
            'name' => 'required|regex:/^[a-zA-Z\\-\\., \']+$/|string|min:3|max:255',
            // 'username' => 'required|string|unique:users,username,'.$userId.'|min:3|max:255',
            'email' => 'required|string|email|unique:users,email,'.$userId.'|min:3|max:255',
            'password' => 'same:password_confirmation',

        );
        return $rules;

    }


}
