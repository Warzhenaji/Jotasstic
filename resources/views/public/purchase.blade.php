@extends('layouts.app')

@section('content')
<div class="flex bg-contain purchase-background w-full h-full">
    <div class="flex w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 ml-40 mr-40 justify-between">
        <form class="w-full max-w-lg bg-gray-400 rounded pt-5 px-10 ml-10" action="{{ route('public.purchase.request') }}" method="post">
            @csrf
            <h1 class="font-bold text-2xl">Order From Me! Easy as 1, 2, 3:</h1>
            <label class="flex flex-col">Name</label>
            <input class="flex shadow-md" type="text" name="firstName">
            <label class="flex flex-col">Email Address</label>
            <input class="flex shadow-md" type="email" name="email">
            <label class="flex flex-col">Artwork</label>
            <input class="flex shadow-md" type="email" name="email">
            <label class="flex flex-col">Anything we should know about your order?</label>
            <input class="flex shadow-md" type="textarea" name="comments">
            <button class="justify-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="submit">
                Request Artwork
            </button>
        </form>
	    <div class="flex w-full h-screen shadow-md rounded border-2 bg-gray-400 ml-10 mr-10 px-8 pt-6 pb-8">
	    	<div class="flex flex-col w-full overflow-y-scroll items-center">
				@foreach($art->chunk(2) as $artChunk)
					<div class="flex flex-row justify-between w-4/5 post-card-row">
						@foreach($artChunk as $art)
							@include('dashboard.partials.post_card', ['art' => $art])
						@endforeach
					</div>
				@endforeach
			</div>
	    </div>
    </div>
</div>
@endsection
