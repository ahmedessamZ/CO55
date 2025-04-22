<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PassportUsersController extends Controller
{

    public function show($id)
    {
        $user = User::findorfail($id);
        return response()->json(["message" => "User info", 'user' => $user], 200);
    }

    public function index()
    {
        $user = User::all();
        return response()->json(["message" => "Users List", 'user' => $user], 200);
    }

    public function store(Request $request)
    {
        $input = $request->only('name', 'email', 'password');
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
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

    public function update(Request $request, User $user)
    {
        $AuthUser = Auth::user();
        if ($AuthUser->id == $user->id) {

            $input = $request->only('name', 'email', 'password');
            $validator = Validator::make($input, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(["message" => $validator->errors()]);
            }

            $data = $request->only('name', 'email');
            $data['password'] = Hash::make($request->password);


            $AuthUser->update($data);

            return response()->json([
                "message" => "User updated successfully.",
                "data" => $AuthUser
            ], 200);
        }
        return response()->json([
            "message" => "not authorized you are not the owner of the user"]);
    }

    public function destroy(User $user)
    {
        $AuthUser = Auth::user();
        if ($AuthUser->id == $user->id) {
            $AuthUser->delete();
            return response()->json(["message" => "Your User Deleted"], 200);
        }
        return response()->json([
            "message" => "not authorized you are not the owner of the user"]);
    }


}
