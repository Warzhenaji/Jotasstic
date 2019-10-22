@extends('layouts.app')

@section('content')
	<div class="flex justify-center mt-4">
		<div class="flex flex-col w-2/5">
			<div class="px-6 py-4 rounded-t shadow-lg text-gray-400 bg-nim-blue opacity-100">
				<p class="text-xl">{{ $post->title }}</p>
				<p class="">By {{ $post->user->name }} on {{ Carbon\Carbon::parse($post->created_at, 'UTC')->timezone('America/Denver')->format('l F jS, Y \a\t g:i a T') }}</p>
			</div>
			<img src="{{ url('/img/uploads/'. $post->media) }}" class="object-contain object-top bg-black">
			<div class="rounded-b px-6 py-4 shadow-lg text-gray-400 bg-nim-blue opacity-100">
				<p class="text-sm">{{ $post->description }}</p>
			</div>
			<div class="px-6 py-4 rounded-b rounded-t card-bg shadow-lg mt-6">
				<p class="text-center">Meta Data and Commenting Coming Soon!</p>
			</div>
		</div>
	</div>
@endsection