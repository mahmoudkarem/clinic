<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);
        User::findOrFail(Auth::user()->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Profile Updated Successfully!');
    }

    public function storeImage(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/upload/patients');
            $image->move($destination, $name);
            User::findOrFail(Auth::user()->id)->update([
                'image' => $name
            ]);
            return redirect()->back()->with('message', 'Profile Image Updated Successfully!');
        }
    }
}
