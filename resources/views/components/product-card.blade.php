<div class="bg-neutral-primary-soft block max-w-sm  border border-default rounded-base shadow-xs {{ $class ?? '' }}">
    <div class=" p-2">
        <img class="rounded-base w-full h-60 md:h-100" src="{{ asset('storage/' . $image) }}"
            alt="{{ $code }} image" />
    </div>
    <div>
        <h5 class="m-2 text-2xl font-semibold tracking-tight text-heading">{{ $code }}</h5>
    </div>
    <p class="m-2 text-body"> {{ $stock }} / {{ $quantity }} pc</p>

</div>
