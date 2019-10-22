@extends('layouts.app')

@section('content')
	<form action="{{ route('dashboard.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="text" name="title" placeholder="Dank Title" value="{{ $post->title }}">
		<textarea name="description" placeholder="Why we should give you dem points">{{ $post->description }}</textarea>
		<img src="{{ url('/img/uploads/'. $post->media) }}">
		<button type="submit">Update</button>
	</form>
@endsection