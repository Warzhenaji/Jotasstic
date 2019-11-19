@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center py-20">
<div class="w-1/5 flex">
<form method="POST" action="{{ route('login') }}" class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-900 text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" id="email" type="email" name="email" placeholder="Email address..">
    </div>
    <div class="mb-6">
      <label class="block text-gray-900 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline bg-white" id="password" type="password" name="password" placeholder="******************">
    </div>
    <div class="mb-6">
      <div class="md:w-1/3"></div>
      <label class="md:w-2/3 block text-gray-900 font-bold">
          <input class="mr-2 leading-tight" type="checkbox" id="remember" name="remember">
          <span class="text-sm">Remember Me</span>
      </label>
    </div>
    <div class="flex items-center justify-between">
      <button class="btn btn-default" type="submit">
        Sign In
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a>
    </div>
  </form>
</div>
@endsection
