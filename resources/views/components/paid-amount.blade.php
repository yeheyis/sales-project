<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">{{ __('Paid Amount') }}</span>
                </th>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">{{ __('Paid Date') }}</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($paidAmounts as $paidAmount)
                @if ($paidAmount->loanee_id == $id)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">


                        <td class="px-6 py-4 font-semibold text-heading">
                            {{ $paidAmount->amount_paid }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-heading">
                            {{ $paidAmount->created_at->toDayDateTimeString() }}
                        </td>

                    </tr>
                @endif

            @empty
                <div class="col-span-full flex items-center justify-center h-[60vh]">
                    <h1 class=" font-semibold text-2xl">{{ __('No paid amount available') }}</h1>
                </div>
            @endforelse


        </tbody>
    </table>
</div>
