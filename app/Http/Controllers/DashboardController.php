<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
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
        $today      = Carbon::today();     // Mendapatkan tanggal hari ini
        $yesterday  = Carbon::yesterday(); // Tanggal kemarin
        $todaySales = DB::table('transaksis')
            ->whereDate('created_at', $today)
            ->sum('price'); // Menjumlahkan kolom 'price'

        // Total penjualan kemarin
        $yesterdaySales = DB::table('transaksis')
            ->whereDate('created_at', $yesterday)
            ->sum(DB::raw('quantity * price'));

        // Hitung Growth Rate
        // $growthRate = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100: 0;

        $growthRate = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100 : 0;

        // Format angka menggunakan fungsi formatNumberShort
        $formattedTotalSales = $this->formatNumberShort($todaySales);

                                                      // Format Growth Rate
        $formattedGrowthRate = round($growthRate, 1); // Bulatkan ke 1 desimal

        $salesProgress = ($todaySales > 0 && $yesterdaySales > 0) ? min(($todaySales / $yesterdaySales) * 100, 100) : 0;

        $growthProgress = $growthRate > 0 ? min($growthRate, 100) : 0;

        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        $users = User::orderBy('created_at', 'desc')->get();

        $userStats = [];

        for ($i = 6; $i >= 0; $i--) {
            $date  = Carbon::today()->subDays($i)->toDateString();
            $count = DB::table('users')
                ->whereDate('created_at', $date)
                ->count();

            $userStats[] = $count;
        }

        $totalUsers          = User::count();
        $formattedTotalUsers = $this->formatNumberShort($totalUsers); // contoh: 97.4K

        $currentMonth = Carbon::now()->format('m');
        $lastMonth    = Carbon::now()->subMonth()->format('m');

        $currentMonthUsers = User::whereMonth('created_at', $currentMonth)->count();
        $lastMonthUsers    = User::whereMonth('created_at', $lastMonth)->count();

        $userGrowthRate = $lastMonthUsers > 0
        ? (($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100
        : 0;

        $formattedUserGrowth = round($userGrowthRate, 1); // jadi 12.5%

        // return view('admin.index', compact('formattedTotalSales', 'todaySales', 'formattedGrowthRate', 'salesProgress', 'growthProgress', 'orders', 'users', 'userStats'));

        $activeThisMonth = User::whereMonth('created_at', Carbon::now()->month)->count();
        $activeLastMonth = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();

        $formattedActiveUsers = $this->formatNumberShort($activeThisMonth); // Misal: "42.5K"
        $activeGrowth         = $activeLastMonth > 0
        ? (($activeThisMonth - $activeLastMonth) / $activeLastMonth) * 100
        : 0;
        $formattedActiveGrowth = round($activeGrowth, 1); // Misal: "24.2"

        return view('admin.index', compact(
            'formattedTotalSales', 'todaySales', 'formattedGrowthRate', 'salesProgress',
            'growthProgress', 'orders', 'users', 'userStats',
            'formattedTotalUsers', 'formattedUserGrowth',
            'formattedActiveUsers', 'formattedActiveGrowth'
        ));
    }

}
