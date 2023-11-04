<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequestForm;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(RegisterRequestForm $request)
    {
        $token = $request->save();

        return response(['token' => $token], 201);
    }
}
