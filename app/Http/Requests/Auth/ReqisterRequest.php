<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ReqisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['required','string','max:50'],
            'email'=>['required','email','max:256'],
            'password'=>['required','string','min:6']
        ];
    }
}
