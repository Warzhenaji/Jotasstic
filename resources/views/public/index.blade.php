@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		{{ $post->title }}
		<img src="/img/uploads/{{ $post->media }}">
	@endforeach
@endsection