<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $monthTotalCount = Order::where('created_at', '>=', now()->subDays(30))->count();
        $monthTotalPrice = Order::where('created_at', '>=', now()->subDays(30))->sum(DB::raw('amount * price'));
        $TotalCount = Order::count();
        $TotalPrice = Order::sum(DB::raw('amount * price'));
        return view('layouts.app', compact('TotalCount','TotalPrice','monthTotalCount','monthTotalPrice'));
    }
}
