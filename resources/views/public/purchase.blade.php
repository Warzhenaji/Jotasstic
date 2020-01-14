@extends('layouts.app')

@section('content')
<div class="flex bg-contain purchase-background w-full h-full">
    <div class="flex w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 ml-40 mr-40">
        <form class="w-full max-w-lg bg-gray-400 rounded" action="{{ route('public.purchase.request') }}" method="post">
            @csrf
            <label class="flex flex-col">Name</label>
            <input class="flex shadow-md" type="text" name="firstName">
            <label class="flex flex-col">Email Address</label>
            <input class="flex shadow-md" type="email" name="email">
            <label class="flex flex-col">Artwork</label>
            <input class="flex shadow-md" type="email" name="email">
            <label class="flex flex-col">Anything we should know about your order?</label>
            <input class="flex shadow-md" type="textarea" name="comments">
            <button class="justify-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Request Artwork
            </button>
        </form>
    </div>
</div>
@endsection
