<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserFormRequest;
use App\User;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.profile.index');
    }

    public function store (UserFormRequest $request) {

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->info = $request['info'];
        $user->username = $request['username'];
        $user->youtube = $request['youtube'];
        $user->linkedin = $request['linkedin'];
        $user->github = $request['github'];

        if (trim($request['password'])) {
            $user->password = bcrypt($request['password']);
        }

        if ($request->hasFile('photo')) {
            $path = Storage::disk('public')->put('/profile', $request->file('photo'));
            Storage::disk('public')->delete('profile/'. auth()->user()->photo);
            $user->photo = explode('/', $path)[1];
        }

        $user->save();

        return redirect()->back()->with('success', 'Tu perfil se actualizó exitosamente');
    }
}
