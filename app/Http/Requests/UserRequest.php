<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'photo'=> 'required|mimes:png,jpg,jpeg|max:5000'
        ];
    }
    // public function messages(): array
    // {
    //     return [
    //         'photo.required' => 'Photo field required!'
    //     ];
    // }
    public function attributes(): array
    {
        return [
            'photo' => 'File'
        ];
    }
}