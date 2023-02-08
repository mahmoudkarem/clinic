@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Admin</h5>
                    <span>Add Admin</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Admins</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <h3>Add Admin</h3>
            </div>
            <div class="card-body">
                <form class="form-sample" method="POST" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                @csrf
                <input name="role_id" value="2" type="hidden">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Full Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Doctor Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Doctor Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Doctor Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control  @error('phone_number') is-invalid @enderror" placeholder="Doctor Phone Number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control  @error('address') is-invalid @enderror" placeholder="Doctor Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control  @error('gender') is-invalid @enderror" id="exampleSelectGender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
