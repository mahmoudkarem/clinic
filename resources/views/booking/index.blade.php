@extends('layouts.app')

@section('content')
<div style="margin-top: 150px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Your Appointments ({{ $bookings->count() }})</h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Appointment Time</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key => $booking)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>Dr. {{ $booking->doctor->name }}</td>
                                <td>{{ date('m-d-Y', strtotime($booking->date)) }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->created_at }}</td>
                                <td>
                                    @if($booking->status == 0)
                                    <a class="btn btn-primary">Not Visited</a>
                                    @else
                                    <a class="btn btn-success">Visited</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td>You have no appointments</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
