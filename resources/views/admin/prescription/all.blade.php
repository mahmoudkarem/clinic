@extends('admin.layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Prescribed-Patients ({{ $prescriptions->count() }})</h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date Visited</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Patient Email</th>
                                <th scope="col">Patient Phone</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($prescriptions as $key => $prescription)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ date('m-d-Y', strtotime($prescription->date)) }}</td>
                                <td>{{ $prescription->patient->name }}</td>
                                <td>{{ $prescription->patient->email }}</td>
                                <td>{{ $prescription->patient->phone_number }}</td>
                                <td>Dr. {{ $prescription->doctor->name }}</td>
                                <td>
                                    <a href="{{ route('prescription.show', [$prescription->patient_id, $prescription->date]) }}" class="btn btn-secondary">View Prescription</a>
                                </td>
                            </tr>
                            @empty
                            <td colspan="9">There is no patients</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
