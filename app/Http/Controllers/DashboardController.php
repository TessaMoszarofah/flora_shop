<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formatNumberShort($number)
    {
        if ($number >= 1000 && $number < 1000000) {
            return number_format($number / 1000, 1) . 'K'; // Format ribuan
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M'; // Format jutaan
        }
        return $number; // Angka kecil tidak diformat
    }

    public function dashboardView()
    {
        $today = Carbon::today(); // Mendapatkan tanggal hari ini
        $yesterday = Carbon::yesterday(); // Tanggal kemarin
        $todaySales = DB::table('transaksis') 
            ->whereDate('created_at', $today)
            ->sum('price'); // Menjumlahkan kolom 'price'

        // Total penjualan kemarin
        $yesterdaySales = DB::table('transaksis')
            ->whereDate('created_at', $yesterday)
            ->sum(DB::raw('quantity * price'));

        // Hitung Growth Rate
        // $growthRate = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100: 0;

        $growthRate = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100: 0;

        // Format angka menggunakan fungsi formatNumberShort
        $formattedTotalSales = $this->formatNumberShort($todaySales);

        // Format Growth Rate
        $formattedGrowthRate = round($growthRate, 1); // Bulatkan ke 1 desimal

        $salesProgress = ($todaySales > 0 && $yesterdaySales > 0) ? min(($todaySales / $yesterdaySales) * 100, 100) : 0;

        $growthProgress = $growthRate > 0 ? min($growthRate, 100) : 0;

        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('formattedTotalSales', 'todaySales','formattedGrowthRate','salesProgress','growthProgress','orders'));
    }

    
}
