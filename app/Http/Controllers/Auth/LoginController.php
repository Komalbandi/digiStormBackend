<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\LoginValidation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $loginValidation;

    function __construct()
    {
        $this->loginValidation = new LoginValidation();
    }

    public function login(Request $request)
    {
        $this->loginValidation->validate($request);

        $user = User::Where('email', $request->email)->first();
        if (Hash::check($request->password,$user->password)) {
            $token = $user->createToken('PersonalAccessToken')->accessToken;

            return response()->json([
                'token' => $token
            ], 200);
        }

        return response()->json(['access denied'], 401);
    }
}
