<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequestForm;
use Illuminate\Http\Request;

class AuthSessionController extends Controller
{
    public function store(LoginRequestForm $request)
    {
        $token = $request->authenticate();
        return response(['token' => $token]);
    }

    public function destroy()
    {
        auth()->user()->tokens()->delete();
        return ['message' => 'logged out'];
    }
}
