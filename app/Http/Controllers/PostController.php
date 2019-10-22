<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function __construct() {
		$this->middleware('auth', ['except' => ['index']]);
	}

    public function index() {
    	$payload = [
    		'posts' => Post::all()
    	];
    	return view('post')->with($payload);
    }

   
}
