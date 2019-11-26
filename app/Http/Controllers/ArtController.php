<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;

class ArtController extends Controller
{
	public function __construct() {
		//
	}

    public function index() {
    	$payload = [
    		'art' => Art::all()
    	];
    	return view('public.index')->with($payload);
    }

   
}
