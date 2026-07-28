<x-meta>


    <div class="max-w-7xl flex flex-col p-2 border-default pb-4">
      <h1 class="mb-4 text-2xl items-start  font-bold tracking-tight text-heading md:text-5xl lg:text-6xl w-full">
            {{ __('List of Loans') }}
        </h1>
        <dl class="max-w-md text-heading divide-y divide-default">
            @foreach ($loanees as $loanee)
                <a class="flex items-center py-2 border-b-1 border-default" href="{{ route('loanee.show', $loanee) }}">
                    <dt class="mb-1 text-body capitalize">{{ $loanee->borrower_name }}</dt>
                </a>
            @endforeach


        </dl>
    </div>

    <a class=" fixed bottom-4 right-4 inline-flex h-auto items-center justify-center rounded-full bg-neutral-950 p-5 font-medium text-neutral-50 shadow-lg shadow-neutral-500/20 transition active:scale-95"
        href="{{ route('loans.create') }}">
        <span class="material-symbols-outlined">
            add
        </span>
    </a>
</x-meta>
