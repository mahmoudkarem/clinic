@extends('admin.layouts.master')

@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-primary">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Patients</h6>
                        <h2>{{ App\Models\User::where('role_id', 3)->count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-success">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Doctors</h6>
                        <h2>{{ App\Models\User::where('role_id', 1)->count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-user-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-warning">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Roles</h6>
                        <h2>3</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-danger">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>All Booking Today</h6>
                        <h2>{{ App\Models\Booking::where('date',now()->format('Y-m-d') )->count() }}</h2>
                    </div>
                    <div class="icon">
                <i class="ik ik-calendar"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-danger">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>All Booking </h6>
                        <h2>{{ App\Models\Booking::count() }}</h2>
                    </div>
                    <div class="icon">
                                                <i class="ik ik-calendar"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-primary">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Prescription</h6>
                        <h2>{{ App\Models\Prescription::count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-edit"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget bg-success">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Department</h6>
                        <h2>{{ App\Models\Department::count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-home"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection