<div>
    
    <div>
   

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Records</h3>

            <form method="GET" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                   
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-600 mb-2">Title</label>
                        <input type="text" id="title" name="filterTitle" value=""
                            class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-gray-900 text-sm px-3 py-2.5 placeholder-gray-400 transition"
                            placeholder="Enter topic">
                    </div>

                    
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-600 mb-2">User Name</label>
                        <input type="text" id="filterUsername" name="filterUsername" value=""
                            class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-gray-900 text-sm px-3 py-2.5 placeholder-gray-400 transition"
                            placeholder="Enter user name">
                    </div>
                </div>

               
                <div class="flex gap-3">
                   
                    <button wire:click="render"
                        class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                               bg-gradient-to-br from-purple-500 to-pink-500 hover:text-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                            Filter Post
                        </span>
                    </button>

                    
                    <button wire:click="resetFilters"
                        class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                               bg-gradient-to-br from-gray-400 to-gray-600 hover:text-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                            Reset
                        </span>
                    </button>
                </div>
            </form>
        </div>


    <div class="min-h-screen bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 flex justify-center items-start py-12">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-3 gap-6 px-4">

        @forelse($posts as $post)
            
            <div class="relative rounded-xl overflow-hidden shadow-2xl hover:scale-105 transform transition duration-500 bg-white/20 backdrop-blur-lg">
          
                
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-white mb-2">{{ $post->title }}</h2>
                    <p class="text-white/80 mb-2">{{ Str::limit($post->content, 100) }}</p>
                    <p class="text-white/60 text-sm">By <span class="font-semibold">{{ $post->user->name ?? 'Unknown' }}</span></p>
                </div>
        </div>
        @empty
            <p class="text-white text-center col-span-3">No posts found.</p>
        @endforelse
       

    </div>
     
</div>
  <div class="flex justify-center mt-4">
                <nav aria-label="Pagination" class="flex items-center">
                   
                    @if ($posts->onFirstPage())
                        <span class="cursor-not-allowed text-gray-400">Previous</span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900">Previous</a>
                    @endif
            
                    
                    <ul class="flex space-x-1 mx-4">
                        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            @if ($page == $posts->currentPage())
                                <li>
                                    <span class="bg-blue-900 text-white px-3 py-1 rounded-md">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="text-blue-900 hover:text-blue-600 px-3 py-1 rounded-md transition">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
            
                   
                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}" class="text-blue-900 hover:text-blue-600">Next</a>
                    @else
                        <span class="cursor-not-allowed text-gray-400">Next</span>
                    @endif
                </nav>
            </div>
        </div>




        
            
</div>
</div>
