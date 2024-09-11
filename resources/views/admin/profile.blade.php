@extends('layouts.admin')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           
            <div class="row"> 
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" id="admin-user-img" src="{{asset('storage/'.$admin->avatar)}}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $admin->name }}</h3>
                            <p class="text-muted text-center">Admin</p> 
                        </div>

                    </div>
 
                   
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="title">Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profileUpdate') }}" id="adminProfileUpdate" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="admin_id" value="{{$admin->id}}" />  
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" value="{{$admin->username}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="{{$admin->email}}">
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label for="inputExperience"
                                        class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone" value="{{$admin->phone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience"
                                        class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dob" value="{{$admin->dob}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience"
                                        class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image"  onchange="previewImage(this,'admin-user-img')" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
@push('scripts') 
<script src="{{asset('admin/helper.js')}}"></script> 
@endpush
