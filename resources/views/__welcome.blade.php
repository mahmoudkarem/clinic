@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner.jpg" class="img-fluid" style="border: 1px solid #ccc;">
        </div>

    </div>   <!-- end row -->

    <hr>

    <!-- search doctors -->
    <form action="{{ route('find.doctor') }}" method="GET">
        <div  class="card ">
            <div class="card-body">
                <div  class="card-header ">Find Doctors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input id="datepicker" type="text" name="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Find Doctors</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- display doctors -->
    <div class="card">
        <div class="card-body">
            <div class="card-header">Available Doctors</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Name</th>
                            <th>Image</th>
                            <th>Department</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $key => $appointment)
                        <tr>
                            <td scope="row">1</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>
                                <img src="{{ asset('upload/doctors/') }}/{{ $appointment->doctor->image }}" width="100px" height="100px" style="border-radius: 50%">
                            </td>
                            <td>{{ $appointment->doctor->department }}</td>
                            <td>
                                <a href="{{ route('create.appointment', [$appointment->user_id, $appointment->date]) }}"><button class="btn btn-success">Book Appointment</button></a>
                            </td>
                        </tr>
                        @empty
                        <td colspan="5">No doctors available today</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
