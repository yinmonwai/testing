<div class="p-8">

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Categories</h2>
        <button wire:click="create"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            + Add Category
        </button>
    </div>

    <!-- Modal -->

    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" wire:click="cancel"></div>
        
        <div class="relative bg-amber-50 rounded-2xl w-full max-w-md p-8 shadow-2xl border border-amber-100">
            
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-800">
                    {{ $categoryId ? 'Edit Category' : 'Create New Category' }}
                </h3>
            </div>

            <form wire:submit.prevent="save" class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">
                        Category Name
                    </label>
                    
                    <input type="text" 
                           wire:model="name" 
                           placeholder="Enter name..."
                           class="block w-full border border-amber-200 bg-white rounded-xl p-3 text-gray-800 shadow-sm focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-medium" />
                    
                    @error('name') 
                        <p class="mt-2 text-red-600 text-xs font-bold">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" 
                            wire:click="cancel"
                            class="px-6 py-2.5 bg-transparent text-gray-800 font-bold rounded-xl hover:bg-amber-100 transition-colors">
                        Cancel
                    </button>
                    
                    <button type="submit"
                            class="px-6 py-2.5 bg-gray-800 text-white font-bold rounded-xl hover:bg-black shadow-lg transition-all active:scale-95">
                        {{ $categoryId ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif

    <!-- Categories Table -->
    <div class="bg-white rounded shadow overflow-hidden border border-gray-200 mt-4">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Name</th>
                    <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-800">{{ $category->name }}</td>
                        <td class="p-3 text-sm space-x-3">
                            <button wire:click="edit({{ $category->id }})"
                                    class="text-gray-800 hover:text-indigo-900 font-medium">
                                Edit
                            </button>
                            <button wire:click="delete({{ $category->id }})"
                                    class="text-red-600 hover:text-red-900 font-medium">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-8 text-center text-gray-500">
                            No categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
