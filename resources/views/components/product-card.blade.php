

<div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
    <a href="{{route('product.show', $product)}}">
        <img class="rounded-base" src="{{asset('storage/' . $image)}}" alt="{{$code}} image" />
    </a>
    <a href="{{route('product.show', $product)}}">
        <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{$code}}</h5>
    </a>
    <p class="mb-6 text-body">{{$quantity}}</p>
    <p class="mb-6 text-body">ETB {{$price}}</p>
    
</div>
