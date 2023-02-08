@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctor</h5>
                    <span>Update Doctor</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
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
                <h3>Update Doctor</h3>
            </div>
            <div class="card-body">
                <form class="form-sample" method="POST" action="{{ route('doctor.update', $doctor->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full Name</label>
                            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Doctor Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $doctor->email }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Doctor Email">
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
                        <div class="col-lg-6">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control  @error('gender') is-invalid @enderror" id="exampleSelectGender">
                                @foreach(['male', 'femail'] as $key => $gender)
                                <option value="{{ $gender }}" @if($doctor->gender == $gender) selected @endif>{{ $gender }}</option>

                                @endforeach
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Education</label>
                            <input type="text" name="education" value="{{ $doctor->education }}" class="form-control  @error('education') is-invalid @enderror" placeholder="Doctor Highest Degree">
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{ $doctor->address }}" class="form-control  @error('address') is-invalid @enderror" placeholder="Doctor Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Department</label>
                            <select name="department" class="form-control @error('department') is-invalid @enderror">
                                @foreach(App\Models\Department::all() as $department)
                                <option value="{{ $department->department }}" @if($doctor->department == $department->department) selected @endif>{{ $department->department }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" value="{{ $doctor->phone_number }}" class="form-control  @error('phone_number') is-invalid @enderror" placeholder="Doctor Phone Number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info  @error('image') is-invalid @enderror" name="image" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Browse Image</button>
                                    </span>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="">Role</label>
                            <select name="role_id" class="form-control  @error('role_id') is-invalid @enderror" id="exampleSelectGender">
                                <option value="">Select Role</option>
                                @foreach(App\Models\Role::where('name', '!=', 'Patient')->get() as $key => $role)
                                <option value="{{ $role->id }}" @if($doctor->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4">{{ $doctor->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection