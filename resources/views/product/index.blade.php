<x-meta>

    <div class="max-w-7xl flex flex-col md:flex-row  items-center justify-between p-2 border-b border-default pb-4">
        <h1 class="mb-4 text-2xl items-start  font-bold tracking-tight text-heading md:text-5xl lg:text-6xl w-full">
            {{ __('List of shoes') }}
        </h1>
        <form action="{{ route('products.search') }}" method="POST" class="flex items-center w-full md:w-xl ">
            @csrf
            <input type="search" id="search-dropdown" id="input-group-1"
                class="px-3 py-2.5 rounded-tl-base rounded-bl-base bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-black focus:border-black block w-full placeholder:text-body"
                placeholder="Search for products" name="query" value="{{ old('query') }}">
            <button type="submit"
                class="inline-flex items-center  text-white bg-black hover:bg-black box-border border border-transparent focus:ring-4  shadow-xs font-medium leading-5 rounded-e-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
                Search
            </button>
        </form>
    </div>


    @if (@session('success')) 
        <x-successfull-alert />
        <script>
            // Wait 5 seconds (5000ms) then hide the alert
            setTimeout(function() {
                let alert = document.getElementById('alert-border-3');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500); // Fully remove after fade
                }
            }, 5000);
        </script>
       
      @endsession

        <form action="{{ route('products.index') }}" method="GET">

            <ul
                class="select-none grid grid-cols-3 md:grid-cols-4 w-full  gap-2 md:grid-cols-5 items-center mt-4 mb-6 ">
                <li>
                    <input type="radio" id="both-option" value="both"
                        {{ request('category') == 'both' ? 'checked' : '' }} name="category" class="hidden peer">
                    <label for="both-option"
                        class="inline-flex  items-center justify-between w-full p-2 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                        <div class="w-full flex items-center justify-center font-medium">{{ __('All') }}</div>
                    </label>
                </li>

                <li>
                    <input type="radio" id="male-option" value="male"
                        {{ request('category') == 'male' ? 'checked' : '' }} name="category" class="hidden peer"
                        required="">
                    <label for="male-option"
                        class="inline-flex  w-full p-2 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                        <div class="w-full flex items-center justify-center font-medium">{{ __('Male') }}</div>
                    </label>
                </li>
                <li>
                    <input type="radio" id="female-option" value="female"
                        {{ request('category') == 'female' ? 'checked' : '' }} name="category" class="hidden peer">
                    <label for="female-option"
                        class="inline-flex items-center justify-between w-full p-2 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                        <div class="w-full flex items-center justify-center font-medium">{{ __('Female') }}</div>
                    </label>
                </li>

                <li>
                    <input type="radio" id="both-option" value="both"
                        {{ request('category') == 'both' ? 'checked' : '' }} name="category" class="hidden peer">
                    <label for="both-option"
                        class="inline-flex  items-center justify-between w-full p-2 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                        <div class="w-full flex items-center justify-center font-medium">{{ __('Out of stock') }}</div>
                    </label>
                </li>

                <li>

                    <x-primary-button type="submit" class="w-full">{{ __('Filter') }}</x-primary-button>
                </li>
            </ul>
        </form>


        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
            @forelse ($products as $product)
                <a href="{{ route('products.show', $product->id) }}">
                    <x-product-card class="" :code="$product->code" :quantity="$product->quantity" :price="$product->price"
                        :image="$product->img_path" :product="$product" :stock="$product->stock" />
                </a>
            @empty
                <div class="col-span-full flex items-center justify-center h-[60vh]">
                    <h1 class=" font-semibold text-2xl">{{ __('No product available') }}</h1>
                </div>
            @endforelse
        </div>

        <a class=" fixed bottom-4 right-4 inline-flex h-auto items-center justify-center rounded-full bg-neutral-950 p-5 font-medium text-neutral-50 shadow-lg shadow-neutral-500/20 transition active:scale-95"
            href="{{ route('products.create') }}">
            <span class="material-symbols-outlined">
                add
            </span>
        </a>
</x-meta>
