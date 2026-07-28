<x-meta>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                <form action="#">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">
                                {{ __('Upload image') }}</label>
                            <div
                                class="mb-4 w-[250px] overflow-auto border border-default rounded bg-neutral-secondary-soft flex items-center justify-center">
                                <img id="imagePreview" class="hidden w-full rounded border" />
                            </div>

                            <input
                                class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                                id="file_input" type="file" name="img_path" accept="image/*">
                            @error('img_path')
                                <p class="text-red-500 text-sm mt-2 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Code') }}</label>
                            <input type="text" name="code" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type code name" required="">
                        </div>
                        <div class="w-full">
                            <label for="brand"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Quantity') }}</label>
                            <input type="text" name="quantity" id="brand"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Shoe quantity" required="">
                        </div>
                        <div class="w-full">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Price') }}</label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Shoe price" required="">
                        </div>
                        <div class="md:col-span-2">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <ul class="select-none grid grid-cols-2 w-full gap-4 md:grid-cols-3 my-2">
                                <li>
                                    <input type="radio" id="react-option" value="male" name="category"
                                        class="hidden peer" required="">
                                    <label for="react-option"
                                        class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                                        <div class="w-full flex items-center justify-center font-medium mb-1">
                                            {{ __('Male') }}</div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="vue-option" value="female" name="category"
                                        class="hidden peer">
                                    <label for="vue-option"
                                        class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                                        <div class="w-full flex items-center justify-center font-medium mb-1">
                                            {{ __('Female') }}</div>
                                    </label>
                                </li>

                            </ul>
                        </div>

                        <x-primary-button type="submit" class="w-full">{{ __('Add') }}</x-primary-button>


                    </div>

                </form>
            </div>
        </section>

    </form>
</x-meta>
