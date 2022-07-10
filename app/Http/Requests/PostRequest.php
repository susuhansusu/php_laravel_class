<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()

    {
        return [
            'title'=> 'required',
            'body'=> 'required|min:5',
            'image_path' => 'required|file|mimes:jpg,jpeg,png'

        ];
    }

    public function message()
    {
        return [
            'image_path.required' => 'Upload the image file.',
            'title.required' => 'Fill the title.',
            'body.required' => 'Fill the body.'
        ];
    }
}
