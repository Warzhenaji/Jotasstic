<div class="max-w-sm rounded-t flex flex-col overflow-hidden mb-6 post-card">
	<a href="{{ route('dashboard.art.show', $art->id) }}"><img class="w-full" src="{{ url('/img/uploads/'. $art->media) }}"></a>
	<div class="px-6 py-4 bg-nim-blue text-gray-400 rounded-b shadow-lg">
		<div class="font-bold text-xl mb-2">
			<a href="{{ route('dashboard.art.show', $art->id) }}">{{ $art->title }}</a>
		</div>
		<div class="">
			{{ $art->amount_formatted }}
		</div>
		@auth
		<a href="{{ route('dashboard.art.edit', $art->id) }}" class="text-right block">Edit</a>
		@endauth
	</div>
</div>