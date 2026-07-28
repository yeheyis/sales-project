<x-meta>


    <!--<div class="max-w-2xl mx-auto p-6">
        <h1 class="text-3xl font-bold">{{ $product->code }}</h1>

        <div class="mt-4 text-gray-700">
            {{ $product->quantity }}
        </div>

        <div class="mt-6 flex gap-4">
            
            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit
                Post</a>
            <a href="{{ route('sales.create', $product->id) }}" class=" bg-green-500 text-white px-4 py-2 rounded"> Record
                a sale</a>
        </div>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete Product
            </button>
        </form>
    </div> -->


<div class="w-full">
  <div>
    <img class="rounded-base w-[250px]" src="{{ asset('storage/' . $product->img_path) }}" alt="{{$product->code}}" />
  </div>
  <div>
    <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{$product->quantity}}</h5>
  </div>
  <div class="grid grid-cols-3 gap-2">
     
    <a href="{{ route('sales.create', $product->id) }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
        Record a sale
        
    </a>
    
    <a href="{{ route('products.edit', $product->id)}}" class="inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base focus:outline-none">
        <span class="material-symbols-outlined">
edit
</span>
    </a>
    
    <form action="{{ route('products.destroy', $product->id) }}" class="w-full border" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger w-full inline-flex items-center justify-center">
                <span class="material-symbols-outlined">
delete
</span>
            </button>
        </form>
  </div>
        
  
        
    <p class="mb-6 text-body">In today’s fast-paced digital landscape, fostering seamless collaboration among Developers and IT Operations.</p>
   
</div>

</x-meta>
