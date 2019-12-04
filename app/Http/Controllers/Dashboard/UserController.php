<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
    	$user = auth()->user();
    	$payload = [
    		'user' => $user,
    		'art' => $user->art,
    	];
        return view('dashboard.users.profile')->with($payload);
    }

    public function updateUser(Request $request) {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('psw');
        $password_confirm = $request->input('psw_confirm');

        if ($password != null && $password_confirm != null && $password == $password_confirm) {
           $user->password = Hash::make($password);
        }
         if ($user->update()) {
                session()->flash('status', [
                    'error' => false,
                    'title' => "Success",
                    'message' => "Information Updated"
                ]);
                return redirect()->back();
            }
            session()->flash('status', [
                'error' => true,
                'title' => "Aw snap, Gur.",
                'message' => "Something went wrong..."
            ]);
            return redirect()->back();
    }
}