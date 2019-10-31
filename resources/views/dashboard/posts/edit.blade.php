@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-4">
		<div class="flex flex-col w-2/5">
			<form action="{{ route('dashboard.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
				<div class="px-6 py-4 rounded-t shadow-lg text-gray-400 bg-nim-blue opacity-100">
					<input type="text" name="title" placeholder="Artwork title..." value="{{ $post->title }}">
					@csrf
					<p class="">Posted by {{ $post->user->name }} on {{ Carbon\Carbon::parse($post->created_at, 'UTC')->timezone('America/Denver')->format('l F jS, Y \a\t g:i a T') }}</p>
				</div>
				<img src="{{ url('/img/uploads/'. $post->media) }}" class="object-contain object-top bg-black">
				<div class="rounded-b px-6 py-4 shadow-lg text-gray-400 bg-nim-blue opacity-100">
					@csrf
					<textarea name="description" placeholder="Artwork description...">{{ $post->description }}</textarea>
					<div class="flex justify-right flex-col text-right block">
						<button type="submit">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection