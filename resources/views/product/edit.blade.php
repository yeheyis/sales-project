<x-meta>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($product->img_path)
            <img src="{{ asset('storage/' . $product->img_path) }}" width="150">
        @endif
        <label for="code" class="block mb-2.5 text-sm font-medium text-heading">Code</label>
        <input type="text" name="code" id="code"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
            placeholder="" required value="{{ $product->code }}" />

        <label for="quantity" class="block mb-2.5 text-sm font-medium text-heading">quantity</label>
        <input type="text" name="quantity" id="quantity"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
            placeholder="" required value="{{ $product->quantity }}" />

        <label for="price" class="block mb-2.5 text-sm font-medium text-heading">price</label>
        <input type="text" name="price" id="price"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
            placeholder="" required value="{{ $product->price }}" />


            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <ul class="select-none grid grid-cols-2 w-full gap-4 md:grid-cols-3 my-2">
                                <li>
                                    <input type="radio" id="react-option" value="male" name="category"
                                    {{ old('category', $product->category) === 'male' ? 'checked' : '' }}
                                        class="hidden peer" required="">
                                    <label for="react-option"
                                        class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                                        <div class="w-full flex items-center justify-center font-medium mb-1">
                                            {{ __('Male') }}</div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="vue-option" value="female" name="category"
                                        {{ old('category', $product->category) === 'female' ? 'checked' : '' }}
                                    class="hidden peer">
                                    <label for="vue-option"
                                        class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">

                                        <div class="w-full flex items-center justify-center font-medium mb-1">
                                            {{ __('Female') }}</div>
</ul>
        
        <div class="my-4">
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
</div>                
        <x-primary-button type="submit">Update Post</x-primary-button>
    </form>
    
</x-metpa>