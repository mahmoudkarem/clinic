@extends('layouts.app')

@section('content')
<div style="margin-top: 150px" class="container">
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h5>User Profile</h5></div>

                <div class="card-body">
                    <p>Name: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Address: {{Auth::user()->address}}</p>
                    <p>Phone: {{Auth::user()->phone_number}}</p>
                    <p>Gender: {{Auth::user()->gender}}</p>
                    <p>Bio: {{Auth::user()->description}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>Update Profile</h5></div>

                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name (REQUIRED)</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label>Gender (REQUIRED)</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Select Gender</option>
                                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea type="text" name="description" class="form-control">{{ Auth::user()->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </forn>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h5>Update Image</h5></div>

                <div class="card-body">
                    <form action="{{ route('profile.image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img width="120" src="{{ Auth::user()->image == null ? 'upload/no_image.jpg' : asset('upload/patients/'.Auth::user()->image) }}" width="120">
                        <br>
                        <br>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
