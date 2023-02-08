<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Appointment;
use Auth;
use DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_appointments = Appointment::latest()->where('user_id', Auth::user()->id)->get();
        return view('admin.appointment.index', compact('my_appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate same appointment date for each user_id
        $request->validate([
            'date' => ' required|unique:appointments,date,NULL,id,user_id,'.Auth::user()->id,
            'time' => 'required'
        ]);

        $appointment = new Appointment();
        $appointment->user_id = Auth::user()->id;
        $appointment->date = $request->date;
        
        DB::transaction(function() use($request, $appointment){
            if($appointment->save()) {     
                foreach($request->time as $key => $time) {
                    Time::create([
                        'appointment_id' => $appointment->id,
                        'time' => $time,
                        // 'status' => 0
                    ]);
                }
            }
        });
        return redirect()->back()->with('message', 'Time slots created for '.$request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request) {
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id', Auth::user()->id)->first();
        
        if(!$appointment) {
            return redirect()->to('/appointment')->with('errmessage', 'Appointment time not available for this date');
        }

        $appointment_id = $appointment->id;
        $times = Time::where('appointment_id', $appointment_id)->get();
        return view('admin.appointment.index', compact('times', 'appointment_id', 'date'));
    }

    public function updateTime(Request $request) {
        $appointment_id = $request->appointment_id;
        // delete all time related to that appointment
        $appointment = Time::where('appointment_id', $appointment_id)->delete();
        
        // create new times
        foreach($request->time as $key => $time) {
            Time::create([
                'appointment_id' => $appointment_id,
                'time' => $time,
                // 'status' => 0
            ]);
        }
        return redirect()->route('appointment.index')->with('message', 'Time slots updated for this date');
    }
}
