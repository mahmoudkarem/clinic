<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role_id', 2)->get();
        return view ('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // name
        // email
        // password
        // phone_number
        // address


        $this->validateStore($request);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('admins.index')->with('message', 'Admins added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $admin = User::findOrFail($id);
        $user_password = $admin->password;
        if($request->password) {
            $data['password'] = bcrypt($request->password);     // new password
        } else {
            $data['password'] = $user_password;     // old password
        }
        $admin->update($data);
        return redirect()->route('admins.index')->with('message', 'Admin updated successfully');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = User::findOrFail($id);
       $admins->delete();
        return redirect()->route('admins.index')->with('message', 'Admin deleted successfully');
    }

    public function validateStore(Request $request) {
        return $request->validate([
            'name' => ['required'],
            'email' => 'required|unique:users,email,',
            'password' => 'required',
            'address' => ['required'],
            'gender' => ['required'],
            'phone_number' => ['required', 'numeric'],
        ]);
    }


    public function validateUpdate(Request $request, $id) {
        return $request->validate([
            'name' => ['required'],
            'email' => 'required|unique:users,email,'.$id,
            'gender' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'numeric',],
            'role_id' => ['required'],
            'password' => 'required',
        ]);
    }
}
