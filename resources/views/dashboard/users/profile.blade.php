@extends('layouts.app')

@section('content')
	<div class="flex w-full py-4 justify-center">
		<div class="flex w-3/4 w-full">
			<div class="flex flex-col w-1/4 mr-32 w-full">
				<div class="flex flex-col w-full">
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

						<button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Submit</button>
					</form>
				</div>
			</div>
			<div class="flex flex-col w-3/4 px-4">
				<p class="text-gray-100 text-3xl font-bold">Live Artwork</p>
				@if(count($art) > 1)
				@foreach($art->chunk(3) as $artChunk)
					<div class="flex justify-between post-card-row">	
						@foreach($artChunk as $art) 
							@include('dashboard.partials.post_card', ['art' => $art])
						@endforeach
					</div>
				@endforeach
				@endif
			</div>		
		</div>
	</div>
@endsection