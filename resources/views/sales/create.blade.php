<x-meta>
    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div>
            <input type="text" hidden class="text" value="{{ $product->id }}" name="product_id" />
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">{{ __('Code name') }}</label>

            <input type="text" id="code"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                placeholder="" name="product_code" value="{{ $product->code }}" disabled />
        </div>

        <div>
            <label for="quantity" class="block mb-2.5 text-sm font-medium text-heading">{{ __('Quantity') }}</label>
            <input type="text" id="quantity"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                placeholder="" name="quantity" required />
        </div>

        <div>
            <label for="price" class="block mb-2.5 text-sm font-medium text-heading">{{ __('price') }}</label>
            <input type="number" id="price"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                placeholder="" name="price" required />
        </div>

        <ul class="select-none grid grid-cols-2 w-full gap-4 md:grid-cols-3 my-2">
            <li>
                <input type="radio" id="react-option" value="transfer" name="payment_type" class="hidden peer"
                    required="" checked>
                <label for="react-option"
                    class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                    <div class="w-full font-medium mb-1">{{ __('Transfer') }}</div>
                </label>
            </li>
            <li>
                <input type="radio" id="vue-option" value="cash" name="payment_type" class="hidden peer">
                <label for="vue-option"
                    class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                    <div class="w-full font-medium mb-1">{{ __('Cash') }}</div>
                </label>
            </li>

        </ul>

        <x-primary-button type="submit"
            class="w-full">Add</x-primary-button>
        @if (session('error'))
            <p class="text-red-500 text-sm mt-2">{{ session('error') }}</p>
        @endif
    </form>
</x-meta>
