<x-meta>
<h1>List of shoes</h1>
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
<a href="{{route('product.create')}}">Add</a>
</x-meta>