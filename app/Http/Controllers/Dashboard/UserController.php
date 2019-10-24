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

    public function updateBio(Request $request) {
    	$user = auth()->user();
    	$user->bio = $request->input('bio');
    	if ($user->update()) {
    		return response()->json([
    			'error' => false,
    			'title' => "YEET",
    			'message' => "Done been updated, boi"
    		]);
    	}
    	return response()->json([
			'error' => true,
			'title' => "Aw snap, Gur.",
			'message' => "We can't do it, Captain. We don't have the power."
		]);
    }

    public function updateUser(Request $request) {
        return $request->all();
    }
}