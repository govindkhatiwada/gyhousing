<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Sell;

class BookingController extends Controller
{
    public function AllBookings()
    {
        $book = Bookings::orderBy('created_at', 'desc')->get();

        return view('pages.booking', ['books' => $book]);
    }

    public function AllSaleRequest()
    {
        $sale = Sell::orderBy('created_at', 'desc')->get();

        return view('pages.sell_request', ['sales' => $sale]);
    }
}
