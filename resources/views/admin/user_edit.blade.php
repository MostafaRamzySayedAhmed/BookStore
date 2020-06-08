@extends('admin.master')
@section('user_edit')
<title>Edit User</title>
<div class="user_edit">
<div class="container">
@if(Session::has('error'))
    <div class="alert alert-danger" style="margin-top: 10px">
        {{Session::get('error')}}
    </div>
@endif
    <h2 class="heading">Edit User</h2>
    
				<form method="post" action="{{route('user_update', $user -> id)}}">
                    
                    @csrf
                    
                    <!-- Starting The User Editing Form -->
                        
                        <div class="form-group">
                            <label class="control-label">Fisrt Name</label>
                            <input type="text" class="form-control" name="firstname" required maxlength="100" value="{{$user -> first_name}}">
                        @error('firstname')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" required maxlength="100" value="{{$user -> last_name}}">
                        @error('lastname')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" required maxlength="100" value="{{$user -> full_name}}">
                        @error('fullname')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" required maxlength="100" value="{{$user -> username}}">
                        @error('username')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">E-Mail</label>
                            <input type="email" class="form-control" name="email" required maxlength="100" value="{{$user -> email}}">
                        @error('email')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" required maxlength="50" value="{{$user -> password}}">
                            <input type="checkbox"><span>Show Password</span>
                        @error('password')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <input type="submit" value="Edit User" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection