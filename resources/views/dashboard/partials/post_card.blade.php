<div class="max-w-sm rounded-t flex flex-col overflow-hidden mb-6 post-card">
	<a href="{{ route('dashboard.posts.show', $post->id) }}"><img class="w-full" src="{{ url('/img/uploads/'. $post->media) }}"></a>
	<div class="px-6 py-4 bg-nim-blue text-gray-400 rounded-b shadow-lg">
		<div class="font-bold text-xl mb-2">
			<a href="{{ route('dashboard.posts.show', $post->id) }}">{{ $post->title }}</a>
		</div>
		@auth
		<a href="{{ route('dashboard.post.edit', $post->id) }}" class="text-right block">Edit</a>
		@endauth
	</div>
</div>