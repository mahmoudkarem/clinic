<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role_id', '1')->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        $data = $request->all();
        $img_name = (new User)->userImage($request);

        $data['image'] = $img_name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('doctor.index')->with('message', 'Doctor added successfully');
    }

    public function validateStore(Request $request) {
        return $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'max:25'],
            'gender' => ['required'],
            'education' => ['required'],
            'address' => ['required'],
            'department' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'image' => ['required', 'mimes:jpeg,jpg,png'],
            'role_id' => ['required'],
            'description' => ['required'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::findOrFail($id);
        return view('admin.doctor.delete', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::findOrFail($id);

        return view('admin.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);

        $data = $request->all();
        $doctor = User::findOrFail($id);

        $img_name = $doctor->image;
        $user_password = $doctor->password;
        if($request->file('image')) {
            $img_name = (new User)->userImage($request);
            // remove all image
            unlink(public_path('upload/doctors/'.$doctor->image));
        }

        $data['image'] = $img_name;
        if($request->password) {
            $data['password'] = bcrypt($request->password);     // new password
        } else {
            $data['password'] = $user_password;     // old password
        }

        $doctor->update($data);
        return redirect()->route('doctor.index')->with('message', 'Doctor updated successfully');
    }

    public function validateUpdate(Request $request, $id) {
        return $request->validate([
            'name' => ['required'],
            'email' => 'required|unique:users,email,'.$id,
            'gender' => ['required'],
            'education' => ['required'],
            'address' => ['required'],
            'department' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'image' => ['mimes:jpeg,jpg,png'],
            'role_id' => ['required'],
            'description' => ['required'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // cannot delete yourself
        // if (auth()->user()->id == $id) {
        //     abort(401);
        // }
        $doctor = User::findOrFail($id);
        $doctorDelete = $doctor->delete();
        if($doctorDelete) {
            unlink(public_path('upload/doctors/'.$doctor->image));
        }
        return redirect()->route('doctor.index')->with('message', 'Doctor deleted successfully');
    }
}
