<x-meta>

<h1 class="mb-4 text-2xl font-bold tracking-tight text-heading md:text-5xl lg:text-6xl">{{__('List of shoes')}}</h1>


  
  <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
  @forelse ($products as $product)
    
  <x-product-card 
  :code="$product->code"
  :image="$product->img_path"
  :quantity="$product->quantity"
  :price="$product->price"
  :product="$product->id"
  />
  @empty
  <p>No product available.</p>
  @endforelse
  </div>
<a href="{{route('products.create')}}">Add</a>
</x-meta>