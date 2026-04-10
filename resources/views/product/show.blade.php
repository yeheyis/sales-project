<x-meta>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-3xl font-bold">{{ $product->code }}</h1>

        <div class="mt-4 text-gray-700">
            {{ $product->quantity }}
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('products.index') }}" class="text-blue-500">← Back to all posts</a>
            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit
                Post</a>
            <a href="{{ route('sales.create', $product->id) }}" class=" bg-green-500 text-white px-4 py-2 rounded"> Record
                a sale</a>
        </div>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete Product
            </button>
        </form>
    </div>

</x-meta>
