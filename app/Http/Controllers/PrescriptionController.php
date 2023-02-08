<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Booking;
use Auth;

class PrescriptionController extends Controller
{
    public function patientsVisitedToday() {
        date_default_timezone_set('America/New_York');

        // patients of that doctor only!!
        $bookings = Booking::latest()->whereDate('date', date('Y-m-d'))->where('doctor_id', Auth::user()->id)->where('status', 1)->get();

        return view('admin.prescription.index', compact('bookings'));
    }

    public function storePrescription(Request $request) {
        $data = $request->all();
        // chuyen array thanh 1 day cach nhau bang dau ,
        $data['medicine'] = implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message', 'Prescription Created Successfully!');
    }

    public function showPrescription($userId, $date) {
        $prescription = Prescription::where('patient_id', $userId)->where('date', $date)->first();
        return view('admin.prescription.show', compact('prescription'));
    }

    public function patientsFromPrescription() {
        $prescriptions = Prescription::latest()->where('doctor_id', Auth::user()->id)->get();
        return view('admin.prescription.all', compact('prescriptions'));
    }
}
