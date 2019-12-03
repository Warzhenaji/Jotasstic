@extends('layouts.app')

@section('content')
	@foreach($art->chunk(5) as $artChunk)
		<div class="flex flex-col items-center mt-4">
			<div class="flex justify-between w-4/5 post-card-row">
				@foreach($artChunk as $art)
					@include('dashboard.partials.post_card', ['art' => $art])
				@endforeach
			</div>
		</div>
	@endforeach
@endsection