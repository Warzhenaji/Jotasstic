<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="body-bg">
    <div id="app" class="flex flex-col h-full">
        <nav class="flex bg-nim-blue-darkest items-center justify-between flex-wrap nav-bg p-6 z-50">
            <div class="flex items-center flex-shrink-0 text-white mr-6">               
                <span class="font-semibold text-xl tracking-tight">
                    <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                    <a href="{{ route('dashboard.about') }}" class="ml-10">About Jo</a>
                    <a href="{{ route('dashboard.art.explore') }}" class="ml-10">Explore</a>
                    <a href="{{ route('public.purchase') }}" class="ml-10">Purchase Artwork</a>
                    <a href="{{ route('public.contact') }}" class="ml-10">Contact</a>
                </span>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    @auth
                    @endauth
                </div>
                @auth
                <div class="flex flex-row relative">
                    <a href="{{ route('dashboard.art.create') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Add Artwork</a>
                    <navbar-dropdown
                        :links="{{ json_encode([
                            ['name' => 'Admin Profile', 'url' => route('dashboard.user.profile')],
                            ['name' => 'Orders', 'url' => route('dashboard.user.orders') ],
                        ]) }}"
                        :logout-url="'{{ route('logout') }}'"
                        :user="{{ auth()->user() }}"
                    ></navbar-dropdown>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                </div>
                @endauth
            </div>
        </nav>
        <main class="flex flex-grow">
                @if (session('status'))
                 @if (is_array(session('status')))
                    <div class="w-full absolute z-50">
                    <div class="flex items-center justify-center w-full my-4">
                        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{ session('status')['title'] }}</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{{ session('status')['message'] }}</span>
                        </div>
                    </div>
                    </div>
                 @else
                    <div class="w-full absolute z-50">
                    <div class="flex items-center justify-center w-full my-4">
                        <div class="p-2 bg-orange-600 items-center text-orange-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-orange-400 uppercase px-2 py-1 text-xs font-bold mr-3">Big Yikes!</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{{ session('error') }}</span>
                        </div>
                    </div>
                    </div>
                @endif
                @endif
            @yield('content')
        </main>
        <div class="bg-nim-blue-darkest w-full block lg:flex lg:items-center lg:w-auto">
            <footer id="footer" class="text-center w-full text-center border-grey p-4 pin-b">
                <p class="text-white">&copy; {{ date('Y') }} Jotasstic</p>
            </footer>
        </div>
    </div>
</body>
</html>
