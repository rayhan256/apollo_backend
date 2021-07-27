<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        return view('profile', ['data' => $user]);
    }

    public function update(Request $request) {
        $datauser = Auth::user();
        $user = User::find($datauser->id);

        $data = $request->all();

        $user->name = $data['name'] ?? $datauser->name;
        $user->instagram = $data['instagram'] ?? $datauser->instagram;
        $user->facebook = $data['facebook'] ?? $datauser->facebook;
        $user->twitter = $data['twitter'] ?? $datauser->twitter;
        $user->linkedin = $data['linkedin'] ?? $datauser->linkedin;
        $user->github = $data['github'] ?? $datauser->github;
        $user->bio = $data['bio'] ?? $datauser->bio;

        if ($request->has('image')) {
            $image = $request->file('image');
            $base64 = base64_encode(file_get_contents($image));
            $user->image = $base64;
        }

        $user->save();
        return redirect()->back()->with('pesan', 'Profile Updated');
    }
}
