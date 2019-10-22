<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
	public function index() {
    	$payload = [
    		'posts' => Post::all()
    	];
    	return view('dashboard.posts.index')->with($payload);
    }

    public function show(Post $post) {
        $post->load('comments.user', 'user');
        $payload = [
            'post' => $post
        ];
        return view('dashboard.posts.show')->with($payload);
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
            return redirect()->route('dashboard.post.index')->with('status', 'It done been created.');
        }
        return redirect()->route('dashboard.post.index')->with('status', 'Ya done messed up, Aaron.');
    }

    public function edit(Post $post) {
    	$user = auth()->user();
    	if ($post->user_id !== $user->id) {
    		return redirect()->back()->with('status', 'You Shall Not Pass!');
    	}
    	$payload = [
    		'post' => $post
    	];
    	return view('dashboard.posts.edit')->with($payload);
    }

    public function update(Post $post, Request $request) {
    	$user = auth()->user();
    	if ($post->user_id !== $user->id) {
    		return redirect()->route('dashboard.home')->with('status', 'You Shall Not Pass!');
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
