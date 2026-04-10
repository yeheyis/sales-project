<x-meta>

    <h1 class="mb-4 text-2xl font-bold tracking-tight text-heading md:text-5xl lg:text-6xl">{{ __('List of shoes') }}
    </h1>

    <form action="{{ route('products.index') }}" method="GET">

        <ul class="select-none grid grid-cols-3 w-full gap-4 md:grid-cols-3 my-2">
            <li>
                <input type="radio" id="male-option" value="male" {{ request('category') == 'male' ? 'checked' : '' }}
                    name="category" class="hidden peer" required="">
                <label for="male-option"
                    class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                    <div class="w-full font-medium mb-1">{{ __('Male') }}</div>
                </label>
            </li>
            <li>
                <input type="radio" id="female-option" value="female"
                    {{ request('category') == 'female' ? 'checked' : '' }} name="category" class="hidden peer">
                <label for="female-option"
                    class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                    <div class="w-full font-medium mb-1">{{ __('Female') }}</div>
                </label>
            </li>

            <li>
                <input type="radio" id="both-option" value="both"
                    {{ request('category') == 'both' ? 'checked' : '' }} name="category" class="hidden peer">
                <label for="both-option"
                    class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                    <div class="w-full font-medium mb-1">{{ __('Both') }}</div>
                </label>
            </li>
            <button type="submit">Filter</button>
        </ul>
    </form>


    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @forelse ($products as $product)
            <x-product-card :code="$product->code" :quantity="$product->quantity" :price="$product->price" :image="$product->img_path" :product="$product" />
        @empty
            <p>No product available.</p>
        @endforelse
    </div>
    <a href="{{ route('products.create') }}">Add</a>
</x-meta>
