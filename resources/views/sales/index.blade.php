<x-meta>
    <h2 class="text-2xl/7 font-bold text-black my-2 sm:truncate sm:text-3xl sm:tracking-tight">List of Today's Sales
    </h2>
    <div class="flex flex-col md:flex-row items-start gap-6">

        <form action=" {{ route('sales.filter') }}" method="post"
            class=" flex gap-2 items-center relative max-w-sm md:order-2 p-2">
            @csrf

            <div class="relative w-full">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                    </svg>
                </div>
                <input id="datepicker-format" autocomplete="off" name="date" datepicker type="text"
                    datepicker-format="yyyy-mm-dd"
                    class="block w-full ps-9 pe-3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                    placeholder="Select date">
            </div>


            <button type="submit"
                class=" flex justify-center items-center bg-black text-white font-medium px-4 py-2 rounded-base hover:bg-brand-dark focus:ring-4 focus:outline-none focus:ring-black">
                <span class="material-symbols-outlined">
                    arrow_forward_ios
                </span>
            </button>

        </form>



        <div class=" flex flex-col gap-6 w-full md:w-[70%]">

            <div
                class="relative  w-full md:w-[60%] overflow-x-auto bg-neutral-primary shadow-xs rounded-base border border-default">


                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body border-b border-default">
                        <tr class="w-full">
                            <th scope="col" class="px-6 py-3 bg-neutral-secondary-soft font-medium flex-inline">
                                {{ __('Code name') }}
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                {{ __('Quantity') }}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-neutral-secondary-soft font-medium">
                                {{ __('Price') }}
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                {{ __('Payment type') }}
                            </th>

                        </tr>
                    </thead>
                    <tbody id="sales-table-body">

                        @forelse ($todaySales as $sale)
                            <tr class="border-b border-default">
                                <a href="{{ route('sales.show', $sale) }}">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
                                        <a href="{{ route('sales.show', $sale) }}">{{ $sale->product->code }}</a>
                                    </th>
                                </a>

                                <td class="px-6 py-4">
                                    {{ $sale->quantity }}
                                </td>
                                <td class="px-6 py-4 bg-neutral-secondary-soft">
                                    {{ number_format($sale->price) }}
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



            <div class=" w-full md:w-96 bg-neutral-primary-soft border border-default rounded-base shadow-xs">
                <ul role="list" class="space-y-3 p-6 divide-y divide-default">
                    <li class="flex items-center justify-between pb-3">
                        <div class="flex items-center text-body">
                            <svg class="w-5 h-5 me-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z" />
                            </svg>
                            <span>{{ __('Total sales') }}</span>
                        </div>
                        <span class="text-body font-medium">ETB {{ number_format($totalDailySales) }}</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <div class="flex items-center text-body">
                            <svg class="w-5 h-5 me-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5h-.16667c-.86548 0-1.70761.28071-2.4.8L3.5 8l2 3.5L8 10v9h8v-9l2.5 1.5 2-3.5-2.9333-2.2c-.6924-.51929-1.5346-.8-2.4-.8H15M9 5c0 1.5 1.5 3 3 3s3-1.5 3-3M9 5h6">
                            </svg>
                            <span>{{ __('Total cash sales') }}</span>
                        </div>
                        <span class="text-body font-medium">ETB {{ number_format($totalCashSales) }}</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <div class="flex items-center text-body">
                            <svg class="w-5 h-5 me-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5h-.16667c-.86548 0-1.70761.28071-2.4.8L3.5 8l2 3.5L8 10v9h8v-9l2.5 1.5 2-3.5-2.9333-2.2c-.6924-.51929-1.5346-.8-2.4-.8H15M9 5c0 1.5 1.5 3 3 3s3-1.5 3-3M9 5h6">
                            </svg>
                            <span>{{ __('Total transfer sales') }}</span>
                        </div>
                        <span class="text-body font-medium">ETB {{ number_format($totalTransferSales) }}</span>
                    </li>
                </ul>
            </div>
        </div>





    </div>




</x-meta>
