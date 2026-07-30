<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
 class HomeController extends Controller
{
    public function index(){
        $numberOfMale = Product::where("category", "male")->count();
        $numberOfFemale = Product::where("category", "female")->count();
        $currentYear = now()->year;
        $topProducts = Sale::query()
        ->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
        ->select('product_id')
        ->selectRaw('SUM(quantity) as total_sold')
        ->groupBy('product_id')
        ->orderByDesc('total_sold')
        ->with('product')
        ->take(5)
        ->get();


        // Fetch distinct years dynamically based on DB driver
        $yearExpression = DB::getDriverName() === 'sqlite'
            ? "strftime('%Y', created_at) as year"
            : "EXTRACT(YEAR FROM created_at) as year";

        $availableYears = Sale::selectRaw($yearExpression)
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($year) => (int)$year)
            ->toArray();

        if (empty($availableYears)) {
            $availableYears = [$currentYear];
        }

             $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];
             $data = [1200, 1900, 3000, 5000, 2400];
        return view('home', compact( 'labels', 'data', 'numberOfMale', 'numberOfFemale', 'topProducts' ,'currentYear', 'availableYears'));
    }

    // public function getRevenueData(Request $request)
    // {
    //     $year = $request->input('year', now()->year);

    //     $monthlyData = Sale::select(
    //             DB::raw('MONTH(created_at) as month'),
    //             DB::raw('SUM(price * quantity) as total_revenue')
    //         )
    //         ->whereYear('created_at', $year)
    //         ->groupBy('month')
    //         ->pluck('total_revenue', 'month')
    //         ->toArray();

    //     $revenue = [];
    //     for ($month = 1; $month <= 12; $month++) {
    //         $revenue[] = (float) ($monthlyData[$month] ?? 0);
    //     }

    //     return response()->json([
    //         'year' => $year,
    //         'revenue' => $revenue
    //     ]);
    // }

    public function getRevenueData(Request $request)
    {
        $year = (int) $request->input('year', now()->year);
        $driver = DB::getDriverName();

        // Cross-database SQL definitions
        if ($driver === 'sqlite') {
            $monthSelect = "CAST(strftime('%m', created_at) AS INTEGER) as month";
            $yearWhere   = "CAST(strftime('%Y', created_at) AS INTEGER) = ?";
        } else {
            // PostgreSQL
            $monthSelect = "EXTRACT(MONTH FROM created_at)::INTEGER as month";
            $yearWhere   = "EXTRACT(YEAR FROM created_at) = ?";
        }

        $monthlyData = Sale::select(
            DB::raw($monthSelect),
            DB::raw('SUM(price * quantity) as total_revenue')
        )
            ->whereRaw($yearWhere, [$year])
            ->groupBy('month')
            ->pluck('total_revenue', 'month')
            ->toArray();

        // Build array for all 12 months (filling missing months with 0)
        $revenue = [];
        for ($month = 1; $month <= 12; $month++) {
            $revenue[] = (float) ($monthlyData[$month] ?? 0);
        }

        return response()->json([
            'year' => $year,
            'revenue' => $revenue
        ]);
    }

}
