<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PatientListController extends Controller
{
    public function todayBooking(Request $request) {
        date_default_timezone_set('America/New_York');

        if ($request->date) {
            $date = date('F d, Y', strtotime($request->date));
            $bookings = Booking::latest()->where('date', $request->date)->get();
        } else {
            $date = date('F d, Y');
            $bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
        }

        return view('admin.patientlist.index', compact('bookings', 'date'));
    }

    public function updateBookingStatus($id) {
        $booking = Booking::findOrFail($id);
        // toggle
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();
    }

    public function allBooking() {
        $bookings = Booking::latest()->paginate(5);
        return view('admin.patientlist.all', compact('bookings'));
    }
}
