<x-meta>
    <div class="relative overflow-x-auto bg-neutral-primary shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body border-b border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-neutral-secondary-soft font-medium">
                        {{ __('Code name') }}
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        {{ __('Quantity') }}
                    </th>
                    <th scope="col" class="px-6 py-3 bg-neutral-secondary-soft font-medium">
                        {{ __('Price') }}
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        {{ __('Transfer') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr class="border-b border-default">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
                            <a href="{{ route('sales.show', $sale) }}">{{ $sale->product->code }}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $sale->quantity }}
                        </td>
                        <td class="px-6 py-4 bg-neutral-secondary-soft">
                            {{ $sale->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sale->payment_type }}
                        </td>
                    </tr>
                @empty
                    <tr class="border-b border-default">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
                            No sales found.
                        </th>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</x-meta>
