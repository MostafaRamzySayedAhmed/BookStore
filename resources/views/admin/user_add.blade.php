@extends('admin.master')
@section('user_add')
<title>New User</title>
<div class="user_add">
 <div class="container">
     
    <h2 class="heading">New User</h2>
    
				<form method="post" action="{{url('admin/user_insert')}}">
                    
                    @csrf
                    
                    <!-- Starting The User Adding Form -->
                        
                       <div class="form-group">
                            <label class="control-label">Fisrt Name</label>
                            <input type="text" class="form-control" name="firstname" required maxlength="100">
                        @error('firstname')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" required maxlength="100">
                        @error('lastname')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" required maxlength="100">
                        @error('fullname')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" required maxlength="100">
                        @error('username')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">E-Mail</label>
                            <input type="email" class="form-control" name="email" required maxlength="100">
                        @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" required maxlength="50">
                        @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" required maxlength="50">
                        </div>
                        @isset($error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endisset
                        <input type="submit" value="New User" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection