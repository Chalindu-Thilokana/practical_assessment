<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post register form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
                
                <h3 class="text-lg font-semibold text-gray-700 mb-6">Add Post</h3>

                <form class="space-y-6">
                    <!-- Email -->
                   

                    <!-- Password -->
                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">Title </label>
                        <input type="text" id="topic"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-900 text-sm px-3 py-2" required>
                    </div>

                    <!-- Repeat Password -->
                    <div>
                        <label for="repeat-password" class="block text-sm font-medium text-gray-700 mb-2">post content</label>
                        <textarea id="message" rows="4" placeholder="Write something..."
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-900 text-sm px-3 py-2"></textarea>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-start space-x-2">
                        <input id="terms" type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" required>
                        <label for="terms" class="text-sm text-gray-600">
                            I agree with the
                            <a href="#" class="text-blue-600 hover:underline font-medium">terms and conditions</a>.
                        </label>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
              <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
               save post
              </span>
            </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
