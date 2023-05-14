<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
//for save

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                // Delete old image
                Storage::delete('public/' . $user->image);
            }

            $path = $request->file('image')->store('public/profile_images');
            $user->image = str_replace('public/', '', $path);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
