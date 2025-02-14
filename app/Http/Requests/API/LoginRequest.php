<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $requestData = ['password' => 'required|string']; //, 'user_type' => 'required', 'remember_me' => 'boolean'
        if (request()->has('email') && !empty(request()->email)) {
            $requestData['email'] = 'required|email';
        } else {
            $requestData['mobile'] = 'required';
        }
        return $requestData;
    }
}
