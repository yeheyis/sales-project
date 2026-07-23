<x-meta>
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Sales</h2>
            <form action="{{ route('sales.update', $sale) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <input type="text" name="product_id" value="{{ $sale->product_id }}" class=" hidden" id="">
                    <div class="sm:col-span-2">
                        <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Code Name') }}</label>
                        <input type="text" name="product_name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $product_name }}" required="">
                    </div>
                    <div class="w-full">
                        <label for="quantity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Quantity') }}</label>
                        <input type="text" name="quantity" id="brand"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $sale->quantity }}" required="">
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Price') }}</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $sale->price }}" required="">
                    </div>
                    <ul class="select-none grid grid-cols-3 w-full gap-4 md:grid-cols-3 my-2">
                        <li>
                            <input type="radio"
                                {{ old('payment_type', $sale->payment_type) === 'transfer' ? 'checked' : '' }}
                                id="male-option" value="transfer" name="payment_type" class="hidden peer"
                                required="">
                            <label for="male-option"
                                class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                                <div class="w-full font-medium mb-1">{{ __('Transfer') }}</div>
                            </label>
                        </li>
                        <li>
                            <input type="radio"
                                {{ old('payment_type', $sale->payment_type) === 'cash' ? 'checked' : '' }}
                                id="female-option" value="cash" name="payment_type" class="hidden peer">
                            <label for="female-option"
                                class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                                <div class="w-full font-medium mb-1">{{ __('Cash') }}</div>
                            </label>
                        </li>

                    </ul>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-white bg-[#1d4ed8] hover:bg-[#1d4ed8] focus:ring-4 focus:outline-none focus:ring-[#93c5fd] font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#2563eb] dark:hover:bg-[#1d4ed8] dark:focus:ring-[#1e40af]">
                        Update sale
                    </button>
            </form>
            <form action="{{ route('sales.destroy', $sale) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Delete
                </button>
            </form>

        </div>

        </div>
    </section>
</x-meta>
