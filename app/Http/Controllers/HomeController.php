<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Order;
use App\Models\Destination;
use Illuminate\Http\Request;

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
        $total_destinations = Destination::all()->count();
        $total_users = User::all()->count();
        $total_events = Event::all()->count();
        $pending_orders = Order::where("payment_status", "pending")->count();
        return view('home', compact('total_destinations', 'total_users', 'total_events', 'pending_orders'));
    }
}
