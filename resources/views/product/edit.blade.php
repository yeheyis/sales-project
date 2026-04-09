<x-meta>
  
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($product->img_path)
        <img src="{{ asset('storage/' . $product->img_path) }}" width="150">
    @endif
<label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Code</label>
            <input type="text" name="code" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required 
            value="{{$product->code}}"/>
            
<label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">quantity</label>
            <input type="text" name="quantity" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required 
            value="{{$product->quantity}}"/>
            
<label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">price</label>
            <input type="text" name="price" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required 
            value="{{$product->price}}"/>
  
        <div class="flex items-center mb-4">
    <input id="default-radio-1"
    {{old('category', $product->category) === 'male' ? 'checked' : ''}}
    type="radio" value="male" name="category" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
    <label for="default-radio-1" class="select-none ms-2 text-sm font-medium text-heading">Male</label>
</div>
<div class="flex items-center">
    <input id="default-radio-2" 
    {{old('category', $product->category) === 'female' ? 'checked' : ''}}
    type="radio" value="female" name="category" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
    <label for="default-radio-2" class="select-none ms-2 text-sm font-medium text-heading">Female</label>
</div>
    <input type="file" name="img_path">
    <button type="submit">Update Post</button>
</form>
</x-meta>