<x-meta >
  
<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
  @csrf
<div>
    <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Code</label>
            <input type="text" name="code" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Quantity</label>
            <input type="text" name="quantity" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        
        
        <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Price</label>
            <input type="text" name="price" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        <div>
            
<label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Upload img</label>
<input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="file_input" type="file" name="img_path">

        </div>
        
        
<div class="flex items-center mb-4">
    <input id="default-radio-1" type="radio" value="male" name="category" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
    <label for="default-radio-1" class="select-none ms-2 text-sm font-medium text-heading">Male</label>
</div>
<div class="flex items-center">
    <input id="default-radio-2" type="radio" value="female" name="category" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
    <label for="default-radio-2" class="select-none ms-2 text-sm font-medium text-heading">Female</label>
</div>

</div>
  <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Add</button>
</form>
</x-meta>