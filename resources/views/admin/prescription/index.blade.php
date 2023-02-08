@extends('admin.layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4>Today Visits ({{ $bookings->count() }})</h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Patient Email</th>
                                <th scope="col">Patient Phone</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key => $booking)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ date('m-d-Y', strtotime($booking->date)) }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->patient->name }}</td>
                                <td>{{ $booking->patient->email }}</td>
                                <td>{{ $booking->patient->phone_number }}</td>
                                <td>Dr. {{ $booking->doctor->name }}</td>
                                <td>
                                    @if($booking->status == 0)
                                    <span class="badge badge-pill badge-success">Pending</span>
                                    @else
                                    <span class="badge badge-pill badge-success">Visited</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!App\Models\Prescription::where('date', date('Y-m-d'))
                                        ->where('doctor_id', Auth::user()->id)->where('patient_id', $booking->user_id)->exists())
                                    
                                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                                        data-target="#exampleModal{{$booking->user_id}}">
                                        Write Prescription
                                    </button>

                                    @include('admin.prescription.modal')

                                    @else
                                        <a href="{{ route('prescription.show', [$booking->user_id, $booking->date]) }}" class="btn btn-secondary">View Prescription</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td colspan="9">There is no patients visited today</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
