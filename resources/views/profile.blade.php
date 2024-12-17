@extends('master')
@section('profile')
<title>Profile</title>
<div class="profile">
<div class="container">
@isset($success)
    <div class="alert alert-success" style="margin-top: 10px">
        {{$success}}
    </div>
@endisset
    <h2 class="heading">Profile</h2>
    <div class="panel">
        <div class="panel-heading">
            <i class="fa fa-info"></i>
            <span>Profile Info</span>
        </div>
        <div class="panel-body">
            <div>
                <label class="control-label">First Name</label>
                <input type="text" class="form-control" value="{{$user -> first_name}}" readonly>
            </div>
            <div>
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" value="{{$user -> last_name}}" readonly>
            </div>
            <div>
                <label class="control-label">Full Name</label>
                <input type="text" class="form-control" value="{{$user -> full_name}}" readonly>
            </div>
            <div>
                <label class="control-label">Username</label>
                <input type="text" class="form-control" value="{{$user -> username}}" readonly>
            </div>
            <div>
                <label class="control-label">E-Mail</label>
                <input type="text" class="form-control" value="{{$user -> email}}" readonly>
            </div>
            <div>
                <label class="control-label">Password</label>
                <input type="password" class="form-control" value="{{$user -> password}}" readonly>
                <input type="checkbox"><span>Show Password</span>
            </div>
            <a href="{{url('user_edit')}}" class="btn btn-primary">
                <i class="fa fa-edit"></i>Edit Profile</a>
        </div>
    </div>
	 
</div>
</div>
@endsection