<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function profile(Request $request)
    {
        if($request->isMethod('post'))
        {
            $user = User::find(Auth::user()->id);

            if($request->file('avatar'))
            {
                if(Auth::user()->profile->avatar){
                    unlink('images/users/' . Auth::user()->profile->avatar);
                }

                $extension = strtolower($request->file('avatar')->getClientOriginalExtension());
                $imageName = time() . '.' . $extension;
                $request->file('avatar')->move('images/users/', $imageName);

                $user->profile->update(['avatar' => $imageName]);
            }

            if($request->password)
            {
                $request->validate([
                    'current_password' => 'required',
                    'password' => 'required|min:6|confirmed'
                ]);

                $current_password = Auth::user()->password;

                if(Hash::check($request->current_password, $current_password))
                {
                    $user->password = Hash::make($request->password);
                    $user->save();
                }
            }

            return redirect(route('admin.profile'))->with('success', 'Update Profile Successfully!');
        }

        return view('backend.profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login')->with('success', 'Logout Successfully');
    }

    public function login(Request $request)
    {
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1)
            {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');

            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $email = $credentials['email'];
            $password = bcrypt($credentials['password']);

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role_id' => 1]))
            {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('admin.login')->with('error', 'Account is wrong!');
            }
        }

        return view('backend.login');
    }
}
