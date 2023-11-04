<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequestForm extends RegisterRequestForm
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function authenticate()
    {
        if (! Auth::attempt($this->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid data',
            ]);
        }

        return auth()->user()->createToken('main')->plainTextToken;
    }
}
