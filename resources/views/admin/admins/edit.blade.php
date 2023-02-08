@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Admin</h5>
                    <span>Edit Admin</span>
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
                <h3>edit Admin</h3>
            </div>
            <div class="card-body">
                <form class="form-sample" method="POST" action="{{ route('admins.update',$admin->id) }}" >
                @csrf
                @method("PUT")
                <input name="role_id" value="2" type="hidden">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Full Name</label>
                            <input type="text" name="name" value="{{$admin->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Admin Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$admin->email}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Admin Email">
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
                            <input value="" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Admin Password">
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
                            <input type="text" name="phone_number" value="{{$admin->phone_number}}" class="form-control  @error('phone_number') is-invalid @enderror" placeholder="Admin Phone Number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{$admin->address}}" class="form-control  @error('address') is-invalid @enderror" placeholder="Admin Address">
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
                                <option {{ $admin->gender == "male" ? "selected" : "" }} value="male">Male</option>
                                <option {{ $admin->gender == "female" ? "selected" : "" }} value="female">Female</option>
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
