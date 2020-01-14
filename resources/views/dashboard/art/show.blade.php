@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full explore-background">
		<div class="flex justify-center flex-col w-1/5">
			<div class="flex px-6 py-4 rounded-t shadow-lg text-gray-400 bg-nim-blue opacity-100">
				<p class="flex text-xl">{{ $art->title }}</p>
			</div>
			<img src="{{ url('/img/uploads/'. $art->media) }}" class="object-contain object-top bg-black">
			<div class="rounded-b px-6 py-4 shadow-lg text-gray-400 bg-nim-blue opacity-100">
				<p class="flex text-sm">{{ $art->description }}</p>
				<p class="flex text-sm">{{ $art->amount }}</p>
				<p class="flex">By {{ $art->user->name }} on {{ Carbon\Carbon::parse($art->created_at, 'UTC')->timezone('America/Denver')->format('l F jS, Y \a\t g:i a T') }}</p>
			</div>
		</div>
	</div>
@endsection