<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class LoginValidation
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validate($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
