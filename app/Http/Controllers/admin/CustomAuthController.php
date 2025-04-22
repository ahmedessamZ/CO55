<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function register(AdminStoreRequest $request)
    {
        $request->validated();
        $imageName = time() . '-' . $request->name . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->only('name','mobile','email');
        $data['password'] = Hash::make($request->password);
        $data['image'] = $imageName;
        $admin = admin::create($data);
        $admin->save();

        return redirect('login')->with('success', 'you have registered successfully');

    }

    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember_token;


        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('admins');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function forgetForm()
    {
        return view("auth.password.forget");
    }

    public function forgetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
        ]);
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $action_link = route('resetForm', ['token' => $token, 'email' => $request->email]);
        $body = "we received your request to reset the password for you app name account associated with ur email you can reset you password by clicking the link below";
        \Mail::send('auth.password.email-forget', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('noreplay@example.com', 'your app name');
            $message->to($request->email, 'Your Name')->subject('Reset Password');
        });
        return back()->with('success', 'we have e-mailed your password reset link!');
    }

    public function resetForm(Request $request, $token = null)
    {
        return view("auth.password.reset")->with(['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/'
        ]);
        $check_token = \DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'invalid or expired token');
        } else {
            Admin::where('email', $request->email)->update([
                'password' => \Hash::make($request->password)
            ]);
            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();
            return redirect()->route('login')->with('success', 'Your password has been changed!
            you can login with new password now')->with('verifiedEmail', $request->email);
        }
    }

}
