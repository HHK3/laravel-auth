<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function showPasswordForm()
    {
        return view('profile.edit_password_form');
    }

    public function updatePassword(Request $request)
    {

//        $user = User::where('email', '=', 'email@address.com')->first();
//        Hash::check('INPUT PASSWORD', $user->password);

        $user = Auth::user();

        $data = $request->validate(
            [
                'password_old' => 'required',
                'new_password' => 'required|min:6|confirmed',
                'new_password_confirmation' => 'required|min:6'
            ]
        );

        if (Hash::check($request->password_old, $user->password)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('change');
        }

    }
}
