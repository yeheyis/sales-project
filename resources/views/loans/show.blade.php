<x-meta>
    <div class="">
        <h1 class="text-2xl font-bold text-heading mb-4 capitalize">{{ $loanee->borrower_name }}</h1>

        <div class="fixed bottom-4 right-4 flex gap-2">
            <div data-modal-target="add_modal" data-modal-toggle="add_modal"
                class=" inline-flex h-auto items-center justify-center rounded-full bg-neutral-950 p-5 font-medium text-neutral-50 shadow-lg shadow-neutral-500/20 transition active:scale-95">
                <span class="material-symbols-outlined">
                    add_2
                </span>
            </div>
            <div data-modal-target="pay_modal" data-modal-toggle="pay_modal"
                class=" inline-flex h-auto items-center justify-center rounded-full bg-neutral-950 p-5 font-medium text-neutral-50 shadow-lg shadow-neutral-500/20 transition active:scale-95">
                <span class="material-symbols-outlined">
                    attach_money
                </span>
            </div>
        </div>

        <div class="flex flex-col gap-4 mb-4">
            <div class=" flex gap-2 items-start justify-between w-full">
                <div class="">
                    <x-sale-table :loans=$loans :id="$loanee->id" />

                </div>
                <div class="">
                    <x-paid-amount :paidAmounts="$paidAmounts" :id="$loanee->id" />

                </div>
            </div>

            <div
                class=" w-full md:w-[40%] overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                        <tr class ="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                            <td class="px-6 py-4 font-semibold text-heading">Total Amount</td>
                            <td class="px-6 py-4 font-semibold text-heading">Total Paid Amount</td>
                            <td class="px-6 py-4 font-semibold text-heading"> Unpaid Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $loans->sum('total_price') }}</td>
                            <td>{{ $loanee->loanPaidAmounts->sum('amount_paid') }}</td>
                            <td>{{ $loans->sum('total_price') - $loanee->loanPaidAmounts->sum('amount_paid') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <form action="{{ route('loans.store') }}" method="post">

            @csrf
            <div id="add_modal" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="id"
                                class=" mb-2 text-sm hidden font-medium text-gray-900 dark:text-white">{{ __("Customer's id") }}</label>
                            <input type="text" name="loanee_id" id="id"
                                class="bg-gray-50 hidden border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $loanee->id }}" required="">
                            {{-- <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Customer's Name") }}</label>
                            <input type="text" name="borrower_name" id="name"
                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                disabled value="{{ $loanee->borrower_name }}" required=""> --}}
                        </div>
                        <div class="sm:col-span-2">
                            <label for="product"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Product') }}</label>
                            <select id="product" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="quantity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Customer's quantity") }}</label>
                            <input type="text" name="quantity" id="quantity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type quantity" required="">
                        </div>

                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Price') }}</label>
                            <input type="text" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type price" required="">
                        </div>

                        <x-primary-button type="submit">Add dube</x-primary-button>
                    </div>
                </div>

            </div>

        </form>

        <form action="{{ route('loan-paid-amount.store') }}" method="post">
            @csrf
            <div id="pay_modal" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="id"
                                class=" mb-2 text-sm hidden font-medium text-gray-900 dark:text-white">{{ __("Customer's id") }}</label>
                            <input type="text" name="loanee_id" id="id"
                                class="bg-gray-50 hidden border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $loanee->id }}" required="">

                        </div>
                        <div class="sm:col-span-2">
                            <label for="amount_paid"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Amount Paid') }}</label>
                            <input type="text" name="amount_paid" id="amount_paid"
                                class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type amount paid" required="">
                        </div>

                        <x-primary-button type="submit">Add dube</x-primary-button>
                    </div>
                </div>
        </form>


    </div>
    </div>
</x-meta>
