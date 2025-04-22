<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to select all the user except the auth user
        $admins = Admin::where('id', '!=', Auth::guard('admins')->id())->get();
        return view('admin.admins.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdminStoreRequest $request)
    {
        $request->validated();

        $imageName = time() . '-' . $request->name . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->only('name', 'mobile', 'email');
        $data['image'] = $imageName;
        $data['password'] = Hash::make($request->password);

        $admin = Admin::create($data);
        $admin->save();
        return redirect('admins')->with('success', 'admin Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->id == Auth::guard('admins')->id()) {
            abort(403);
        }
        // to 1-fail if no user exists 2- to abort if admin is auth
        return view('admin.admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->id == Auth::guard('admins')->id()) {
            abort(403);
        }
        // to 1-fail if no user exists 2- to abort if admin is auth
        return view('admin.admins.edit')->with('admin', $admin);
    }

    public function showProfile()
    {
        $admin = Auth::guard('admins')->user();
        return view('admin.admins.show')->with('admin', $admin);
    }

    public function editProfile()
    {
        $admin = Auth::guard('admins')->user();
        return view('admin.admins.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */

    public function update(AdminUpdateRequest $request, $id)
    {
        $request->validated();
        $admin = Admin::find($id);
        $input = $request->only('name', 'mobile', 'email');


        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $input['image'] = $newImageName;
        }

        if (!$request->password) {
            unset($request['password']);
            unset($input['password']);
        }

        if ($request->has('password')) {
            $request->validate([
                'password' => 'confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/'
            ]);
            $input['password'] = Hash::make($request->password);
        }
        $admin->update($input);
        return redirect('admins')->with('success', 'admin Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect('admins')->with('success', 'admin deleted!');
    }

}
