<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF;

class PDFController extends Controller
{
    public function index($id)
    {
        $prescriptions = Prescription::where('id', $id)->first();
        // dd($prescriptions);
        $prescriptions_arr = json_decode($prescriptions,true);

        //patient data
        $patient_name = User::select('name')->where('id',$prescriptions['patient_id'])->get();
        $patient_name = json_decode($patient_name,true);
        $npateint_name = $patient_name[0]['name'];
        //doctor data
        $doctor_name = User::select('name')->where('id',$prescriptions['doctor_id'])->get();
        $doctor_name = json_decode($doctor_name,true);
        $ndoctor_name = $doctor_name[0]['name'];

        $pdf = PDF::loadView('testPDF', compact('prescriptions','npateint_name','ndoctor_name'));
        return $pdf->download('tutsmake.pdf');
    }
}
