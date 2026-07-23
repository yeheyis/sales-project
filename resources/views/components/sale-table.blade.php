<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">{{ __('Image') }}</span>
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    {{ __('Product') }}
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    {{ __('Quantity') }}
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    {{ __('Price') }}
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($loans as $loan)
                @if ($loan->loanee_id == $id)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="p-4">
                            <img src="{{ asset('storage/' . $loan->product->img_path) }}"
                                alt="{{ $loan->product->code }} image"
                                class="w-8 aspect-square md:w-24 max-w-full max-h-full">
                        </td>

                        <td class="px-6 py-4 font-semibold text-heading">
                            {{ $loan->product->code }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $loan->quantity }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-heading">
                            {{ $loan->price }}
                        </td>
                    </tr>
                @endif

            @empty
                <div class="col-span-full flex items-center justify-center h-[60vh]">
                    <h1 class=" font-semibold text-2xl">{{ __('No loan available') }}</h1>

                </div>
            @endforelse



        </tbody>
    </table>
</div>
