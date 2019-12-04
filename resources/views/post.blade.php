@extends('layouts.app')

@section('content')
	@foreach($arts as $art)
		<p>
			<img src="{{ url('/img/'. $post->media) }}">
		</p>
	@endforeach
@endsection