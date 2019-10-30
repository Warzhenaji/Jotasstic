<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    		'posts' => $user->posts,
    	];
        return view('dashboard.users.profile')->with($payload);
    }

    public function updateUser(Request $request) {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($user->update()) {
            return redirect()->back()->with('status', [
                'error' => false,
                'title' => "Success",
                'message' => "Information Updated"
            ]);
        }
        return redirect()->back()->with('status', [
            'error' => true,
            'title' => "Aw snap, Gur.",
            'message' => "Something went wrong..."
        ]);
    }
}