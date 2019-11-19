<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
	public function index() {
    	return view('landing');
    }

    public function explore() {
        $payload = [
            'posts' => Post::all()
        ];
        return view('dashboard.posts.explore')->with($payload);
    }

    public function create() {
    	return view('dashboard.posts.create');
    }

    public function store(Request $request) {
    	$user = auth()->user();
    	$title = $request->input('title');
    	$description = $request->input('description');
    	$file = $request->file('meme');

        $fullFileName = $file->getClientOriginalName();
    	$filename = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = pathinfo($fullFileName, PATHINFO_EXTENSION);
    	$newFileName = $user->id.'_'.$filename.'_'.Str::random(10).'.'.$extension;

    	$inputs = [
			'title'       => $title,
			'description' => $description,
			'user_id'     => $user->id,
			'media'       => $newFileName,
    	];

    	$request->meme->storeAs('img/uploads', $newFileName, 'public_path');

    	$newPost = Post::create($inputs);

        if ($newPost) {
            return redirect()->route('dashboard.post.index')->with('status', 'Post Created!');
        }
        return redirect()->route('dashboard.post.index')->with('status', 'Something went wrong...');
    }

    public function edit(Post $post) {
    	$user = auth()->user();
    	if ($post->user_id !== $user->id) {
    		return redirect()->back()->with('status', 'Please login');
    	}
    	$payload = [
    		'post' => $post
    	];
    	return view('dashboard.posts.edit')->with($payload);
    }

    public function update(Post $post, Request $request) {
    	$user = auth()->user();
    	if ($post->user_id !== $user->id) {
    		return redirect()->route('dashboard.home')->with('status', 'Please log in');
    	}

    	$title = $request->input('title');
    	$description = $request->input('description');
    	if (is_null($description)) {
    		$description = '';
    	}

    	$inputs = [
			'title'       => $title,
			'description' => $description,
    	];
    	/*return response()->json($inputs);*/

    	$updatedPost = $post->update($inputs);
    	if ($updatedPost) {
    		return redirect()->route('dashboard.home')->with('status', 'It done been updated.');
    	}
    	return redirect()->route('dashboard.home')->with('status', 'Ya done messed up, Aaron.');
    }
}
