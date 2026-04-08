<x-meta>
  @forelse ($sales as $sale)
    <div>list of todays sales</div>
  @empty  
  <p>No sales found.</p>
  @endforelse
  
  <a href="{{route('sales.create')}}">Add</a>
</x-meta>