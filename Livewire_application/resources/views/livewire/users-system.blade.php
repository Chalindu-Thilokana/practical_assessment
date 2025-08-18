<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Details') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                @if (session()->has('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full border divide-y divide-gray-200" id="table1">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700">Name</th>
                                <th class="px-4 py-2 text-left text-gray-700">Email</th>
                                <th class="px-4 py-2 text-left text-gray-700">Role</th>
                                <th class="px-4 py-2 text-left text-gray-700">Created At</th>
                                <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->userType }}</td>
                                    <td class="px-4 py-2">{{ $user->created_at }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex gap-2">
                                            
                                            <button wire:click="openEditModal({{ $user->id }})"
                                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                                                       bg-gradient-to-br from-green-500 to-lime-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300">
                                                <span class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                                                    Edit
                                                </span>
                                            </button>

                                           
                                            <button wire:click="deleteUser({{ $user->id }})"
                                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group
                                                       bg-gradient-to-br from-red-500 to-pink-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                <span class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-white rounded-md border border-gray-300 group-hover:bg-transparent">
                                                    Delete
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

   
    <x-dialog-modal wire:model="showModal" maxWidth="2xl">
    
    <x-slot name="title">
        Edit User
    </x-slot>

    <x-slot name="content" class="space-y-6">
     
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" id="name" wire:model.defer="name" placeholder="Enter name"
                   class="w-full rounded-lg border-gray-300 shadow-sm p-3 text-gray-900 focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
        </div>

        
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" id="email" wire:model.defer="email" placeholder="Enter email"
                   class="w-full rounded-lg border-gray-300 shadow-sm p-3 text-gray-900 focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
        </div>

        
        <div>
            <label for="role" class="block text-gray-700 font-medium mb-1">Role</label>
            <select id="userType" wire:model.defer="userType"
                    class="w-full rounded-lg border-gray-300 shadow-sm p-3 text-gray-900 focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
               
                <option value="user">User</option>
            </select>
        </div>
    </x-slot>

    
    <x-slot name="footer">
        <div class="flex justify-end gap-3">
         
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
                    {{ $user_id ? 'Update' : 'Save' }}
                </span>
            </button>
        </div>
    </x-slot>
</x-dialog-modal>


    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                responsive: true,
            });
        });
    </script>
</div>
