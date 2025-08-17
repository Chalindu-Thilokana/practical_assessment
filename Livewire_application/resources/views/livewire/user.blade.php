<div>
 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Details') }}
        </h2>
    </x-slot>

         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                     
                   
                        <!-- Search and Per Page -->
                       

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full border divide-y divide-gray-200" id="table1">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700">Title</th>
                                        <th class="px-4 py-2 text-left text-red-700">Content</th>
                                        <th class="px-4 py-2 text-left text-gray-700">Author</th>
                                        <th class="px-4 py-2 text-left text-gray-700">Created At</th>
                                        <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                  
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
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

                        <!-- Pagination -->
                        <div class="mt-4">
                          
                        </div>
                    </div>
                </div>


    
</div>
    </div>


</div>

 <script>
 $(document).ready(function() {
                  $('#table1').DataTable({
                      responsive: true,
                      // Additional DataTable configurations can be added here
                  });
              });
            </script>