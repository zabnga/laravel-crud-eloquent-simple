<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SavePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $slug = !empty($this->slug) ? $this->slug : $this->title;
        $this->merge([
            'slug' => Str::slug($slug),
        ]);
    }

    public function rules()
    {
        $postId = !empty($this->route('post')->id) ? $this->route('post')->id : '';  

        $rules = array(
            'title' => 'required|string|unique:posts,title,'.$postId.'|min:3',
            'slug' => 'unique:posts',
            'slug' => 'sometimes|required|unique:posts,slug,'.$postId.'|min:4',
            'body' => 'required|min:10',
        );
        return $rules;
    }



}
