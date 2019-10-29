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
				<div class="flex flex-col">
					<p class="text-gray-500 text-sm font-bold uppercase">Join Date</p>
					<p class="text-gray-100 text-2xl font-bold">{{ $user->join_date }}</p>
					<form action="{{ route('dashboard.user.update') }}" method="post">
						@csrf
						<label for="name" class="text-gray-500 text-sm font-bold uppercase">Name</label><br>
						<input id="name" name="name" placeholder="Update name..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ auth()->user()->name }}"><br>
						<label for="email" class="text-gray-500 text-sm font-bold uppercase">Email for Client Contact</label><br>
						<input id="email" name="email" placeholder="Update email..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ auth()->user()->email }}"><br>
						<label for="psw" class="text-gray-500 text-sm font-bold uppercase">Change Account Password</label><br>
						<input id="psw" name="psw" placeholder="New password..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"><br>
						<label for="psw_confirm" class="text-gray-500 text-sm font-bold uppercase">Confirm New Password</label><br>
						<input id="psw_confirm" name="psw_confirm" placeholder="Confirm new password..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"><br>

						<button type="submit">Submit</button>
					</form>
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