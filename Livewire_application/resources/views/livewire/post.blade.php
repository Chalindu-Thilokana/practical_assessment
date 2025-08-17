<div>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Filter Card -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Records</h3>

            <form method="GET" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Filter by Topic -->
                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-600 mb-2">Topic</label>
                        <input type="text" id="topic" name="topic" value=""
                            class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-gray-900 text-sm px-3 py-2.5 placeholder-gray-400 transition"
                            placeholder="Enter topic">
                    </div>

                    <!-- Filter by User Name -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-600 mb-2">User Name</label>
                        <input type="text" id="username" name="username" value=""
                            class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-gray-900 text-sm px-3 py-2.5 placeholder-gray-400 transition"
                            placeholder="Enter user name">
                    </div>
                </div>

                <!-- Filter and Reset Buttons -->
                <div class="flex gap-3">
                    <!-- Filter Button -->
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                               bg-gradient-to-br from-purple-500 to-pink-500 hover:text-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                            Filter Post
                        </span>
                    </button>

                    <!-- Reset Button -->
                    <button
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

        <!-- Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Left: Posts Table -->
            <div class="bg-white p-6 rounded-xl shadow flex flex-col">

                <h3 class="text-lg font-semibold text-gray-800 mb-4">Posts details</h3>

                <!-- Header Row -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                    <!-- Add Post Button -->
                    <button wire:click="openCreateModal"
                        class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                               bg-gradient-to-br from-purple-600 to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                            Add Post
                        </span>
                    </button>

                    
                </div>
                @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
        {{ session('error') }}
    </div>
@endif

                
       

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm" id="table1">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-gray-700 font-medium">Title</th>
                                <th class="px-4 py-3 text-left text-gray-700 font-medium">Content</th>
                                <th class="px-4 py-3 text-left text-gray-700 font-medium">Author</th>
                                <th class="px-4 py-3 text-left text-gray-700 font-medium">Created At</th>
                                <th class="px-4 py-3 text-left text-gray-700 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2">Sample Title</td>
                                <td class="px-4 py-2">Sample content...</td>
                                <td class="px-4 py-2">John Doe</td>
                                <td class="px-4 py-2">2025-08-17</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-2">
                                        <!-- Edit Button (Green) -->
                                        <button
                                            class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                                                   bg-gradient-to-br from-green-500 to-lime-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300">
                                            <span
                                                class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                                                Edit
                                            </span>
                                        </button>

                                        <!-- Delete Button (Red) -->
                                        <button
                                            class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                                                   bg-gradient-to-br from-red-500 to-pink-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                            <span
                                                class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                                                Delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Section -->
            <div class="bg-white p-6 rounded-xl shadow flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Right Section</h3>
                <p class="text-gray-600 text-sm">You can add charts, stats, or additional widgets here.</p>
            </div>
        </div>
    </div>






<div>
    <x-dialog-modal wire:model="showModal" maxWidth="2xl">
        <!-- Modal Title -->
        <x-slot name="title">
            {{ $post_id ? 'Edit Post' : 'Add Post' }}
        </x-slot>

        <!-- Modal Content -->
        <x-slot name="content" class="space-y-4">
            <input type="text" wire:model.defer="title" placeholder="Title"
                   class="w-full rounded border p-2 text-gray-900 focus:ring focus:ring-blue-200">
            
            <textarea wire:model.defer="content" placeholder="Content"
                      class="w-full rounded border p-2 text-gray-900 focus:ring focus:ring-blue-200 mt-2" rows="5"></textarea>
        </x-slot>

        <!-- Modal Footer -->
        <x-slot name="footer" class="flex justify-end {{ is_null($post_id) ? 'space-x-3' : '' }}">
            <div class="flex gap-3">
            <!-- Cancel Button -->
            <button wire:click="closeModal"
                    class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                           bg-gradient-to-br from-gray-400 to-gray-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300">
                <span class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                    Cancel
                </span>
            </button>

            <!-- Save Button -->
            <button wire:click="save"
                    class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                           bg-gradient-to-br from-purple-600 to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                <span class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                    {{ $post_id ? 'Update' : 'Save' }}
                </span>
            </button>
            </div>
        </x-slot>
    </x-dialog-modal>
   
</div>








</div>

<script>
    window.addEventListener('swal:modal', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text || '',
            icon: event.detail.icon,
            timer: event.detail.timer || 2000,
            showConfirmButton: false
        });
    });
</script>


<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            responsive: true,
            // Additional DataTable configurations can be added here
        });
    });
</script>
