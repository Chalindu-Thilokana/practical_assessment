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
         <link rel=  "stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
         <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col h-screen sticky top-0">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Blog.com
        </div>
        <nav class="flex-1 px-4 py-6">
            <ul>
                <li class="mb-4">
                    {{-- <a href="{{ route('dashboard') }}" 
                       class="block py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                        Dashboard
                    </a> --}}
                         @php $current = Route::currentRouteName(); @endphp

                    <a href="{{ route('dashboard') }}" wire:navigate
                         class="block px-4 py-2 rounded
                                   {{ $current === 'dashboard' ? 'bg-gray-500 text-white' :  'text-white' }}">
                               Dashboard
                                </a>            </li>
                               
                          <li class="mb-4">
                               @if(auth()->user()->userType === 'admin')
                                 <a href="{{ route('users.index') }}" wire:navigate
                        class="block px-4 py-2 rounded
                         {{ $current === 'users.index' ? 'bg-gray-500 text-white' : ' text-white' }}">Users
                    </a>
                    @endif
                </li>
                
            </ul>
        </nav>
    </aside>


   
    <!-- Main content -->
    <div class="flex-1 bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow sticky top-0 z-10">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
