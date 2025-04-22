<?php

namespace App\Http\Controllers;


use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UiAjaxAuthController extends Controller
{
    public function login()
    {
        return view("uiAuthAjax.login");
    }

    public function registration()
    {
        return view("uiAuthAjax.registration");
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:password|min:6|max:12',
        ], [
            'password_confirmation.same' => 'Password did not matched !',
            'password_confirmation.required' => 'confirm password is required !'
        ]);

        if ($validator->fails()) {
            return Response()->json([
                'status' => 422,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $data = $request->only('name', 'email');
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            $user->save();
            return Response()->json([
                'status' => 200,
                'messages' => 'Registered successfully'
            ]);
        }
    }

    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:12',
        ]);

        if ($validator->fails()) {
            return Response()->json([
                'status' => 422,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loggedInUser', $user->id);
                    return Response()->json([
                        'status' => 200,
                        'messages' => 'success'
                    ]);
                } else {
                    return Response()->json([
                        'status' => 401,
                        'messages' => 'Wrong Credentials'
                    ]);
                }
            }else{
                return Response()->json([
                    'status' => 401,
                    'messages' => 'User not found'
                ]);
            }
        }
    }

}
