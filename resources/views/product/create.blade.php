<x-meta >
  
<form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
  @csrf
<div>
    <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Code</label>
            <input type="text" name="code" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Quantity</label>
            <input type="number" name="quantity" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        
        
        <div>
            <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Price</label>
            <input type="text" name="price" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        
        <div>
            
<label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Upload img</label>
<input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="file_input" type="file" name="img_path">

        </div>
        
     <ul class="select-none grid grid-cols-2 w-full gap-4 md:grid-cols-3 my-2">
    <li>
        <input type="radio" id="react-option" value="react-option" name="category" class="hidden peer" required="" checked>
        <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">                           
            <div class="w-full font-medium mb-1">{{__('Male')}}</div>
        </label>
    </li>
    <li>
        <input type="radio" id="vue-option" value="vue-option" name="category" class="hidden peer">
        <label for="vue-option" class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
            
                <div class="w-full font-medium mb-1">{{__('Female')}}</div>
        </label>
    </li>
    
</ul>   


</div>
  <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Add</button>
</form>
</x-meta>



