<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookFormRequest extends FormRequest
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
            'name' => 'required|min:5|regex:/^[a-zA-Z\s]+$/',
            'author' => 'required|regex:/^[a-zA-Z\s]+$/|min:3'
        ];
    }
    public function messages(){
        return[
            'name.regex'=>"avoid special characters other than white space"
        ];
    }
}
