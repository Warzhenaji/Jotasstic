@extends('layouts.app')

@section('content')
	<div class="w-full flex justify-center">
	    <form action="{{ route('dashboard.art.store') }}" method="POST" enctype="multipart/form-data" class="flex-col flex w-1/3 card-bg shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-6">
	        @csrf
	        <div class="mb-4">
	            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Artwork Title</label>
	            <input type="text" id="title" name="title" placeholder="Sum Dank Title" class="bg-white text-gray-900 px-2 py-3 w-full">
	        </div>
	        <div class="mb-4">
	            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Artwork Price</label>
	            <input type="number" step="0.01" class="bg-white text-gray-900 px-2 py-3 resize-none h-12 w-full" id="amount" name="amount" placeholder="What's your asking price?">
	        </div>
	        <div class="mb-4">
	            <label for="meme" class="block text-gray-700 text-sm font-bold mb-2">Artwork Sample Image</label>
	            <input type="file" id="art" name="art">
	        </div>
	        <div class="mb-0">
	            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Post Artwork</button>
	        </div>
	    </form>
	</div>
@endsection