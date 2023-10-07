<?php

namespace App\Http\Controllers;

use App\AppUsers;
use App\BookingMaster;
use App\Branch;
use App\Category;
use App\EmployeeInfo;
use App\Offer;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use LicenseBoxAPI;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $api = new LicenseBoxAPI();
        $res = $api->verify_license();
        if ($res['status'] !== true) {
            Artisan::call('down');
            abort(503);
        }
        $master = array();
        $master['user'] = AppUsers::count();
        $master['branch'] = Branch::count();
        $master['employee'] = EmployeeInfo::count();
        $master['category'] = Category::count();
        $master['sub_category'] = SubCategory::count();
        $master['offer'] = Offer::count();
        $master['booking'] = BookingMaster::count();
        $master['newBooking'] = BookingMaster::with(['user:id,name', 'branch:id,name'])->where('status', 0)->orderBy('id', 'desc')->limit(5)->get();
        $monthDate = Carbon::now()->subMonths(5);

        $earning = array();
        $counting = array();
        $monthName = array();
        for ($i = 0; $i < 6; $i++) {
            # code...
            $start = $monthDate->copy()->startOfMonth()->toDateTimeString();
            $end = $monthDate->copy()->endOfMonth()->toDateTimeString();
            $count = BookingMaster::whereBetween('start_time', array($start, $end))->count();
            $payment = BookingMaster::where('payment_status', 1)->whereBetween('start_time', array($start, $end))->get();

            array_push($earning, $payment->sum('total'));
            array_push($counting, $count);
            array_push($monthName, $monthDate->format('M'));
            $monthDate->addMonth();
        }
        $master['earning'] = json_encode($earning);
        $master['bookingCount'] = json_encode($counting);
        $master['monthName'] = json_encode($monthName);

        return view('dashboard', compact('master'));
    }
}
