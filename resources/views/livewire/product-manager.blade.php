<div class="p-8">

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Header -->
    @if(!$showForm)
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Products</h2>
            <button wire:click="create"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                + Add Product
            </button>
        </div>
    @endif

    <!-- Form -->
    @if($showForm)
        <div class="mb-6 bg-gray-50 p-6 rounded border border-gray-200 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                {{ $editingProductId ? 'Edit Product' : 'Create New Product' }}
            </h3>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name"
                           class="mt-1 block w-full border border-gray-300 text-gray-800 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select wire:model="category_id"
                            class="mt-1 block w-full border border-gray-300 text-gray-800 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" wire:model="price"
                           class="mt-1 block w-full border border-gray-300 text-gray-800 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" wire:click="cancel"
                            class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    @endif

    <!-- Products Table -->
    @if(!$showForm)
        <div class="bg-white rounded shadow overflow-hidden border border-gray-200">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Name</th>
                        <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Category</th>
                        <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Price</th>
                        <th class="p-3 text-left text-xs font-medium text-white uppercase bg-indigo-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-sm text-gray-900">{{ $product->name }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $product->category->name ?? 'No Category' }}</td>
                            <td class="p-3 text-sm text-gray-900 font-semibold">${{ number_format($product->price, 2) }}</td>
                            <td class="p-3 text-sm space-x-3">
                                <button wire:click="edit({{ $product->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</button>
                                <button wire:click="delete({{ $product->id }})"
                                        class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

</div>
