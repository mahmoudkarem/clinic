<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Prescription;
use Auth;
use Exception;
use Mail;
use App\Mail\AppointmentMail;

class FrontendController extends Controller
{
    public function index(Request $request) {
        date_default_timezone_set('America/New_York');
        if ($request->date) {
            $appointments = $this->findDoctorBasedOnDate($request->date);
        } else {
            // get all appointments today -> sau do get all doctors today
            $appointments = Appointment::where('date', date('Y-m-d'))->get();
        }
        return view('welcome', compact('appointments'));
    }

    public function show($doctorId, $date) {
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        
        $time_slots = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();

        $doctor = User::findOrFail($doctorId);
    
        return view('appointment', compact('time_slots', 'date', 'doctor', 'appointment'));
    }

    public function findDoctorBasedOnDate($date) {
        $appointments = Appointment::where('date', $date)->get();
        return $appointments;
    }

    public function store(Request $request) {
        date_default_timezone_set('America/New_York');

        $request->validate([
            'time' => 'required'
        ]);

        // user only book once 1 day
        $check = $this->checkBookingTimeInterval();
        if ($check) {
            return redirect()->back()->with('errmessage', 'You already made an appointment. Please wait to make next appointment');
        }

        Booking::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
            'time' => $request->time,
            'date' => $request->date
        ]);

        // send email confirmation
        $doctor = User::findOrFail($request->doctor_id);
        $emailData = [
            'name' => Auth::user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctor_name' => $doctor->name
        ];
        try {
            Mail::to(Auth::user()->email)->send(new AppointmentMail($emailData));
        } catch(Exception $e) {

        }

        // update status of time
        Time::where('appointment_id', $request->appointment_id)->where('time', $request->time)->update([
            'status' => 1
        ]);

        return redirect()->back()->with('message', 'Your appointment was booked successfully!');
    }

    public function checkBookingTimeInterval() {
        // chi duoc dat hen 1 ngay 1 appointment thoi
        return Booking::latest()->where('user_id', Auth::user()->id)
            ->whereDate('created_at', date('Y-m-d'))->exists();
    }

    public function myBooking() {
        $bookings = Booking::latest()->where('user_id', Auth::user()->id)->get();
        return view('booking.index', compact('bookings'));
    }

    // patient
    public function myPresciption() {
        $prescriptions = Prescription::where('patient_id', Auth::user()->id)->get();
        return view('my-prescription', compact('prescriptions'));
    }



    // API
    public function doctorToday(Request $request) {
        // today date
        date_default_timezone_set('America/New_York');

        $doctors_today = Appointment::with('doctor')->whereDate('date', date('Y-m-d'))->get();
        return $doctors_today;
    }

    public function findDoctors(Request $request) {
        $doctors = Appointment::with('doctor')->whereDate('date', $request->date)->get();
        return $doctors;
    }
}
