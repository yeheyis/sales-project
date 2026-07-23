<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleController extends Controller
{
    // Display a listing of the sales
    public function index(){
      $sales = Sale::all();
      $todaySales = Sale::whereDate('created_at', Carbon::today())->get();
        $totalDailySales = Sale::whereBetween('created_at', [Carbon::today(), Carbon::now()])
            ->selectRaw('SUM(quantity * price) as total')
            ->value('total');

    $totalCashSales = Sale::where('payment_type', 'cash')
        ->whereBetween('created_at', [Carbon::today(), Carbon::now()])
        ->selectRaw('SUM(quantity * price) as total')
        ->value('total');

    $totalTransferSales = Sale::where('payment_type', 'transfer')
        ->whereBetween('created_at', [Carbon::today(), Carbon::now()])
        ->selectRaw('SUM(quantity * price) as total')
        ->value('total');

    $chartData = Sale::selectRaw('DATE(created_at) as date, SUM(quantity * price) as total')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();
    $labels = $chartData->pluck('date');
    $data = $chartData->pluck('total');



      return view('sales.index', compact('sales', 'todaySales', 'totalDailySales', 'totalCashSales', 'totalTransferSales', 'labels', 'data'));
    }

    public function create (Product $product) {

      return view('sales.create', compact('product'));
    }

    // Store a newly created sale in storage
    public function store(Request $request){

      $validated = $request->validate([
          'product_id' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'price' => 'required | numeric',
          'payment_type'  => 'required',
          ]);

          if($validated['quantity'] > Product::find($validated['product_id'])->stock) {
            return redirect()->back()->with('error', 'Not enough stock available');
          }else{


            Sale::create($validated);
            $product = Product::find($validated['product_id']);
            $product->decrement('stock', $validated['quantity']);
            return redirect()->route('products.index')->with('success', 'Added successfully');
          }


    }

    // Display the specified sale
    public function show(Sale $sale){
        $product_name = $sale->product->code;
      return view('sales.show', compact('sale', 'product_name'));
    }



     // Update the specified sale in storage
     public function update(Request $request, Sale $sale){

      $validated = $request->validate([
          'product_id' => 'required | string | max:255',
          'quantity' => 'required | integer',
          'price' => 'required | numeric',
          'payment_type'  => 'required',
          ]);

          $sale->update($validated);
          return redirect()->route('sales.index')->with('success', 'Updated successfully');
    }

     // Remove the specified sale from storage
     public function destroy(Sale $sale){
      $sale->delete();
      $product = Product::find($sale->product_id);
      $product->increment('stock', $sale->quantity);
      return redirect()->route('sales.index')->with('success', 'Deleted successfully');
    }

    public function filter(Request $request)
    {

        $date = Carbon::parse($request->date)->toDateString();

        $sales = Sale::with('product')
            ->whereDate('created_at', $date)
            ->get();

        $todaySales = Sale::whereDate('created_at', $date)->get();
        $totalDailySales = Sale::whereBetween('created_at', [$date, Carbon::parse($date)->endOfDay()])
            ->selectRaw('SUM(quantity * price) as total')
            ->value('total');

        $totalCashSales = Sale::where('payment_type', 'cash')
            ->whereBetween('created_at', [$date, Carbon::parse($date)->endOfDay()])
            ->selectRaw('SUM(quantity * price) as total')
            ->value('total');

        $totalTransferSales = Sale::where('payment_type', 'transfer')
            ->whereBetween('created_at', [$date, Carbon::parse($date)->endOfDay()])
            ->selectRaw('SUM(quantity * price) as total')
            ->value('total');

        return view('sales.index', compact('sales', 'todaySales', 'totalDailySales', 'totalCashSales', 'totalTransferSales'));
    }
}
