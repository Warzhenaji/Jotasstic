@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		<p>
			<img src="{{ url('/img/'. $post->media) }}">
		</p>
	@endforeach
@endsection