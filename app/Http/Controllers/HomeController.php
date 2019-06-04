<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Booking;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings = Booking::join('users', 'users.id', '=', 'bookings.user_id')
                           ->join('company', 'company.id', '=', 'bookings.company_id')
                           ->select('users.name', 'company.model', 'bookings.date_start', 'bookings.date_end')
                           ->get();

        return view('home', ['bookings'=>$bookings]);
    }
}
