<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{-- resources/views/layouts/livewire.blade.php --}}


    <style>
        /* Fade-in animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 1s forwards; }
        .animate-fade-in.delay-200 { animation-delay: 0.2s; }
        .animate-fade-in.delay-400 { animation-delay: 0.4s; }
        .animate-fade-in.delay-600 { animation-delay: 0.6s; }

        /* Floating circles animation */
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .animate-bounce-slow { animation: bounce-slow 6s ease-in-out infinite; }
        .animate-bounce-slow.delay-200 { animation-delay: 0.2s; }
        .animate-bounce-slow.delay-400 { animation-delay: 0.4s; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans flex flex-col">

    {{-- Navbar --}}
    <nav class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 shadow-lg text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
 @php $current = Route::currentRouteName(); @endphp
                {{-- Logo --}}
                <div class="flex-shrink-0 font-bold text-2xl tracking-wider">
                    <a href="{{ route('dashboard') }}" class="hover:text-yellow-300 transition-colors duration-300">BlogSphere</a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="#" wire:click="$emit('navigate','web.index')" class="px-4 py-2 hover:bg-white/50 transition">
                              Home
                      </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" wire:navigate class="rounded-md px-4 py-2 bg-yellow-400 text-purple-700 font-semibold hover:bg-yellow-300 transition duration-300">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" wire:navigate class="rounded-md px-4 py-2 bg-white text-purple-600 font-semibold hover:bg-yellow-400 hover:text-purple-700 transition duration-300">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" wire:navigate class="rounded-md px-4 py-2 bg-purple-600 text-white font-semibold hover:bg-purple-500 transition duration-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                {{-- Mobile Menu --}}
                <div class="md:hidden flex items-center" x-data="{ open: false }">
                    <button @click="open = !open" class="focus:outline-none">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :d="open ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        @click.away="open = false"
                        class="absolute top-full right-0 mt-1 w-48 bg-gradient-to-r from-purple-400 via-pink-400 to-red-400 rounded-lg shadow-lg py-2 z-50"
                    >
                        <a href="{{ route('web.index') }}" wire:navigate class="block px-4 py-2 hover:bg-yellow-200 hover:text-purple-700 transition duration-300">Home</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block px-4 py-2 hover:bg-yellow-200 hover:text-purple-700 transition duration-300">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-yellow-200 hover:text-purple-700 transition duration-300">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-yellow-200 hover:text-purple-700 transition duration-300">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-r from-purple-100 via-pink-100 to-yellow-100 text-gray-800 overflow-hidden h-screen flex flex-col justify-center">
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="absolute w-40 h-40 bg-yellow-200 rounded-full opacity-40 animate-bounce-slow top-10 left-1/4"></div>
            <div class="absolute w-32 h-32 bg-pink-200 rounded-full opacity-30 animate-bounce-slow top-32 right-1/4"></div>
            <div class="absolute w-48 h-48 bg-purple-200 rounded-full opacity-25 animate-bounce-slow top-1/3 left-1/2"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight animate-fade-in">
                    Welcome to <span class="text-purple-600">BlogSphere</span>
                </h1>
                <p class="text-lg md:text-2xl text-gray-700/90 animate-fade-in delay-200">
                    Discover amazing articles, share your thoughts, and explore trending posts from our community.
                </p>

                <div class="mt-6 flex flex-col md:flex-row gap-4 animate-fade-in delay-400">
                    <a href="{{ route('dashboard') }}" wire:navigate class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-500 hover:scale-105 transition transform duration-300">
                        ADD Posts
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center md:justify-end relative">
                <div class="flex space-x-6">
                    <div class="w-16 h-16 bg-purple-600 text-white rounded-full flex items-center justify-center shadow-lg animate-bounce-slow">
                        <i class="fas fa-pen-nib text-2xl"></i>
                    </div>
                    <div class="w-16 h-16 bg-pink-500 text-white rounded-full flex items-center justify-center shadow-lg animate-bounce-slow delay-200">
                        <i class="fas fa-lightbulb text-2xl"></i>
                    </div>
                    <div class="w-16 h-16 bg-yellow-400 text-purple-700 rounded-full flex items-center justify-center shadow-lg animate-bounce-slow delay-400">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Livewire Component Slot --}}
    <main class="flex-1 py-10 px-4">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h2 class="text-2xl font-bold mb-4">MyApp</h2>
                    <p class="text-gray-100/80">Your go-to platform for awesome blog posts, news, and updates.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-300 transition duration-300">Home</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-yellow-300 transition duration-300">Posts</a></li>
                        <li><a href="{{ route('profile.show') }}" class="hover:text-yellow-300 transition duration-300">Profile</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-300 transition duration-300">About Us</a></li>
                        <li><a href="#" class="hover:text-yellow-300 transition duration-300">Blog</a></li>
                        <li><a href="#" class="hover:text-yellow-300 transition duration-300">Contact</a></li>
                        <li><a href="#" class="hover:text-yellow-300 transition duration-300">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Stay Connected</h3>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-twitter"></i> Twitter</a>
                        <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-instagram"></i> Instagram</a>
                    </div>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="w-full px-3 py-2 rounded-l-md text-gray-900 focus:outline-none">
                        <button class="bg-yellow-400 text-purple-700 px-4 py-2 rounded-r-md font-semibold hover:bg-yellow-300 transition duration-300">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="mt-12 border-t border-white/30 pt-6 text-center text-gray-100/80 text-sm">
                &copy; {{ date('Y') }} MyApp. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>    
    <script>
        // Initialize Flowbite components
        Flowbite.init();
    </script>
        </div>

        @livewireScripts
    </body>
</html>
