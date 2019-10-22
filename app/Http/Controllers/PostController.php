<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function __construct() {
		//
	}

    public function index() {
    	$payload = [
    		'posts' => Post::all()
    	];
    	return view('public.index')->with($payload);
    }

   
}
