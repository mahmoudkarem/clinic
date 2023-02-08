@extends('admin.layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All appointments for {{ $date }} ({{ $bookings->count() }})</h4>
                </div>

                <form action="{{ route('today.booking') }}" method="GET">
                @csrf
                    <div class="card-header">
                        Filter: &nbsp;
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="date" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

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
                                    <a  href="{{ route('update.booking.status', $booking->id) }}" class="btn btn-primary">Pending</a>
                                    @else
                                    <a href="{{ route('update.booking.status', $booking->id) }}" class="btn btn-success">Visited</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td colspan="8">There is no appointments today</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
