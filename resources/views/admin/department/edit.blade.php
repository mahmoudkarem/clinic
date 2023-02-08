@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Department</h5>
                    <span>Update Department</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Update Department</h3>
            </div>
            <div class="card-body">
                <form class="form-sample" method="POST" action="{{ route('department.update', $department->id) }}">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Department Name</label>
                            <input type="text" name="department" value="{{ $department->department }}" class="form-control @error('department') is-invalid @enderror" placeholder="Department Name">
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    <br>

                    <div>
                        <button type="submit" class="btn btn-primary mr-2">Upadte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection