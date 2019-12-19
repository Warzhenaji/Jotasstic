@extends('layouts.app')

@section('content')
<div class="flex bg-contain purchase-background w-full h-full">
    <div class="flex bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 ml-40 mr-40">
        <form class="w-full max-w-lg" action="{{ route('public.purchase.request') }}" method="post">
            @csrf
            <input type="text" name="firstName">
            <button type="submit">
                Request Artwork
            </button>
        </form>
    </div>
</div>
@endsection
