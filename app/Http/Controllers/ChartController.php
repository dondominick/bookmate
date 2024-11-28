<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\none;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getChartData()
    {
        $borrowed = BorrowedBook::where('availability', 'borrowed')->count();
        $returned = BorrowedBook::where('availability', 'returned')->count();
        // Example data for the chart
        $data = [
            'labels' => ['Borrowed', 'Returned'],
            'datasets' => [
                [
                    'label' => 'Books in Circulation',
                    'backgroundColor' => ['rgba(75, 192, 192, 1)', 'rgba(75, 12, 12, 1)'],
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => [$borrowed, $returned], // Example sales data
                ],
            ],
        ];

        return response()->json($data);
    }

    public function getUserChartData()
    {
        $borrowed = BorrowedBook::where('availability', 'borrowed')->where('user_id', Auth::id())->count();
        $returned = BorrowedBook::where('availability', 'returned')->where('user_id', Auth::id())->count();

        $sample_data = [10, 10, 10];
        // Example data for the chart
        // $data = [
        //     'labels' => ['Borrowed', 'Returned'],
        //     'datasets' => [
        //         [
        //             'label' => 'Books in Circulation',
        //             'backgroundColor' => ['rgba(75, 192, 192, 1)', 'rgba(75, 12, 12, 1)'],
        //             'borderColor' => 'rgba(75, 192, 192, 1)',
        //             'borderWidth' => 1,
        //             'data' => $sample_data, // Example sales data
        //         ],
        //     ],
        // ];

        return response()->json($sample_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
