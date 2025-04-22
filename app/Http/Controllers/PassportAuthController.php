<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PassportAuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $input = $request->only('name', 'email', 'password');

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }


        $data = $request->only('name', 'email');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->save();

        return response()->json([
            "message" => "User Created successfully.",
            "data" => $user
        ], 200);

    }

    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = Auth::user()->createToken('Bearer')->accessToken;
            return response()->json(["message" => "User Logged successfully.",'token' => $token], 200);
        } else {
            return response()->json(['error' => 'wrong credentials'], 401);
        }
    }
}
