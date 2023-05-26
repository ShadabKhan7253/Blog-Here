<?php

namespace App\Http\Requests\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array|exists:tags,id',
            'image' => 'required|image|mimes:png,jpg,svg|max:1024'
        ];
    }
}
