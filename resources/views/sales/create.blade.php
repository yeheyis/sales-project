<x-meta>
  <form method="POST" action="{{route('sales.store')}}">
  @csrf
  <div>
    <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">{{__('Code name')}}</label>
    
    <input type="text" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
             placeholder="" name="product_id" required />
  </div>
        
  <div>
    <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">{{__('Quantity')}}</label>
    <input type="text" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" name="quantity" required />
  </div>
        
  <div>
    <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">{{__('Price')}}</label>
    <input type="text" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" name="price" required />
  </div>
        
 <ul class="select-none grid grid-cols-2 w-full gap-4 md:grid-cols-3 my-2">
    <li>
      <input type="radio" id="react-option" value="transfer" name="payment_type" class="hidden peer" required="" checked>
      <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">                           
        <div class="w-full font-medium mb-1">{{__('Transfer')}}</div>
    </label>
    </li>
    <li>
      <input type="radio" id="vue-option" value="cash" name="payment_type" class="hidden peer">
      <label for="vue-option" class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
            
        <div class="w-full font-medium mb-1">{{__('Cash')}}</div>
      </label>
    </li>
    
</ul>

<button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong my-2 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Add</button>
</form>
</x-meta>