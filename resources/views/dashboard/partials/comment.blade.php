<div class="flex items-start mb-4 text-sm mt-6 bg-gray-400 shadow-xl rounded-t rounded-b">
    <img src="{{ $comment->user->avatar }}" class="w-10 h-10 rounded mt-1 ml-1 mb-1 mr-3">
    <div class="flex-1 overflow-hidden">
        <div>
            <span class="font-bold">{{ $comment->user->name }}</span>
            <span class="text-grey text-xs">{{ date('M jS, \'y \@ g:i a', strtotime($comment->created_at)) }}</span>
        </div>
        <p class="text-black leading-normal pr-2 pb-2">{{ $comment->comment_body }}</p>
    </div>
</div>