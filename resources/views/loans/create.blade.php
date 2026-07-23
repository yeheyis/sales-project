<x-meta>
    <section class="bg-white dark:bg-gray-900">

        @if (session('error'))
            <x-error-alert />
        @endif

        @error('')
        @enderror

        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new dube</h2>
            <form action="{{ route('loanee.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Customer's Name") }}</label>
                        <input type="text" name="borrower_name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type borrower's name" required="">
                    </div>
                    <x-primary-button type="submit">Add dube</x-primary-button>
                </div>

            </form>
        </div>
    </section>
</x-meta>
