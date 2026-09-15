<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.customer', compact('user'));
    }

    public function bookings()
    {
        $user = Auth::user();
        $bookings = \App\Models\Booking::where('user_id', Auth::id())
            ->with(['partner', 'category'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.bookings', compact('bookings', 'user'));
    }
}
