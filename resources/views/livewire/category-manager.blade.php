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
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg w-96 p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">
                    {{ $categoryId ? 'Edit Category' : 'Create New Category' }}
                </h3>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name"
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('name') <p class="mt-1 text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" wire:click="cancel"
                                class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Save
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
                        <td class="p-3 text-sm text-gray-900">{{ $category->name }}</td>
                        <td class="p-3 text-sm space-x-3">
                            <button wire:click="edit({{ $category->id }})"
                                    class="text-indigo-600 hover:text-indigo-900 font-medium">
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
