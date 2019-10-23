@extends('layouts.app')

@section('content')
	@foreach($posts->chunk(5) as $postChunk)
		<div class="flex flex-col items-center mt-4">
			<div class="flex justify-between w-4/5 post-card-row">
				@foreach($postChunk as $post)
					@include('dashboard.partials.post_card', ['post' => $post])
				@endforeach
			</div>
		</div>
	@endforeach
@endsection