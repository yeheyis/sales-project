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
  <div class="grid grid-cols-4 gap-2">
     
    <a href="{{ route('sales.create', $product->id) }}" class="inline-flex col-span-2 items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
        Record a sale
        
    </a>
    
    <a href="{{ route('products.edit', $product->id)}}" class="inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base focus:outline-none">
        <span class="material-symbols-outlined">
            edit
        </span>
    </a>
    
    <form action="{{ route('products.destroy', $product->id) }}" class="" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base focus:outline-none w-full h-full">
                <span class="material-symbols-outlined">
delete
</span>
            </button>
        </form>
  </div>

  <div class="relative my-4 overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="bg-neutral-secondary-soft border-b border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Price
                </th>
                <th scope='col' class ='px-6 py-3 font-medium' >
                    Date
                </th>
                
            </tr>
        </thead>
        <tbody>
        @forelse($sales as $sale)
        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">

            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
            {{ $sale->quantity}}
                </td>
                <td class="px-6 py-4">
                {{$sale->price}}
                </td>
                <td class='px-6 py-4'>
                {{$sale->created_at->format('M d, Y')}}
                </td>
                </tr>
            @empty
            @endforelse
                
                
                
        </tbody>
    </table>
</div>

   
</div>
</x-meta>
