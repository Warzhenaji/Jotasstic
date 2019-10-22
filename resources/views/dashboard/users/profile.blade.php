@extends('layouts.app')

@section('content')
	<div class="w-full py-16 bg-blue-400 flex items-center justify-center user-banner">
		<p class="text-6xl font-bold w-3/4 text-white text-shadow-black">{{ $user->possessive_name }} Profile</p>
		<!-- Photo by Jeremy Thomas -->
		<!-- https://unsplash.com/@jeremythomasphoto?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge -->
	</div>
	<div class="flex w-full py-4 justify-center">
		<div class="flex w-3/4">
			<div class="flex flex-col w-1/4 mr-6">
				<user-bio-card
					:update-url="'{{ route('dashboard.user.update_bio') }}'"
					:user="{{ auth()->user() }}"></user-bio-card>
				<div class="flex flex-col">
					<p class="text-gray-500 text-sm font-bold uppercase">Join Date</p>
					<p class="text-gray-100 text-2xl font-bold">{{ $user->join_date }}</p>
				</div>
			</div>
			<div class="flex flex-col w-3/4 px-4">
			@foreach($posts->chunk(3) as $postchunk)
				<div class="flex justify-between post-card-row">	
					@foreach($postchunk as $post) 
						@include('dashboard.partials.post_card', ['post' => $post])
					@endforeach
				</div>
			@endforeach
			</div>		
		</div>
	</div>
@endsection