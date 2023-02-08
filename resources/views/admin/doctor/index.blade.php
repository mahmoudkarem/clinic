@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>List of all doctors</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="card">
            <div class="card-header"><h3>Data Table</h3></div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="nosort">Image</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($doctors) > 0)
                        @foreach($doctors as $key => $doctor)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td><img src="{{ asset('upload/doctors/') }}/{{ $doctor->image }}" class="table-user-thumb" alt=""></td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->address }}</td>
                            <td>{{ $doctor->phone_number }}</td>
                            <td colspan="2">
                                <div class="table-actions">
                                    <a href="#">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$doctor->id}}">
                                            <i class="ik ik-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('doctor.edit', $doctor->id) }}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="ik ik-edit-2"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('doctor.show', $doctor->id) }}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="ik ik-trash-2"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                            <td>x</td>
                        </tr>

                        <!-- show modal -->
                        @include('admin.doctor.modal')

                        @endforeach
                        @else
                        <td colspan="7">No doctors to display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
