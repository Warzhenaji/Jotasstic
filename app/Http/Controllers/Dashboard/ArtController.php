<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Art;
use Illuminate\Support\Str;

class ArtController extends Controller
{
    public function index() {
        return view('landing');
    }

    public function show() {
        
    }

    public function explore() {
        $payload = [
            'art' => Art::all()
        ];
        return view('dashboard.art.explore')->with($payload);
    }

    public function create() {
        return view('dashboard.art.create');
    }

    public function store(Request $request) {
        $user = auth()->user();
        $title = $request->input('title');
        $description = $request->input('description');
        $file = $request->file('art');

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

        $newArt = Art::create($inputs);

        if ($newArt) {
            return redirect()->route('dashboard.art.index')->with('status', 'Media Posted!');
        }
        return redirect()->route('dashboard.art.index')->with('status', 'Something went wrong...');
    }

    public function edit(Art $art) {
        $user = auth()->user();
        if ($art->user_id !== $user->id) {
            return redirect()->back()->with('status', 'Please login');
        }
        $payload = [
            'art' => $art
        ];
        return view('dashboard.art.edit')->with($payload);
    }

    public function update(Art $art, Request $request) {
        $user = auth()->user();
        if ($art->user_id !== $user->id) {
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

        $updatedArt = $art->update($inputs);
        if ($updatedArt) {
            return redirect()->route('dashboard.home')->with('status', 'Media Updated!');
        }
        return redirect()->route('dashboard.home')->with('status', 'Something went wrong...');
    }

    public function delete(Art $Art) {
        $user = auth()->user();
        if ($art->user_id !== $user->id) {
            return redirect()->route('dashboard.home')->with('status', 'Please log in');
        }

        $art->delete();

        return redirect()->back();
    }

    public function requestPurchase() {

    } 
}
