<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function indexRekap(Request $request)
    {
        $orders       = collect();
        $totalSeluruh = 0;

        if ($request->start_date && $request->end_date) {
            $orders = Order::with('user')
                ->where('status', 'complate')
                ->whereBetween('created_at', [$request->start_date, $request->end_date])
                ->get();

            $totalSeluruh = $orders->sum('total');
        }
        return view('admin.laporan.rekapTransaksi', compact('orders', 'totalSeluruh'));
    }
}
