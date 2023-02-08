@extends('layouts.app')

@section('content')

<div style="margin-top: 100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Disease</th>
                                <th scope="col">Symptoms</th>
                                <th scope="col">Medicines</th>
                                <th scope="col">Procedure</th>
                                <th scope="col">Doctor Feedback</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($prescriptions as $key => $prescription)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $prescription->date }}</td>
                                <td>{{ $prescription->doctor->name }}</td>
                                <td>{{ $prescription->disease }}</td>
                                <td>{{ $prescription->symptoms }}</td>
                                <td>{{ $prescription->medicine }}</td>
                                <td>{{ $prescription->procedure }}</td>
                                <td>{{ $prescription->feedback }}</td>
                            </tr>
                            @empty
                            <td colspan="8">You have no prescriptions</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
