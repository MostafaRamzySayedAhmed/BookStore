@extends('master')
@section('login')
<title>Login</title>
<div class="login">
 <div class="container">
     @if(Session::has('success'))
         <div class="alert alert-success">
             {{Session::get('success')}}
         </div>
     @endif
      @if(Session::has('error'))
         <div class="alert alert-danger">
             {{Session::get('error')}}
         </div>
      @endif 
     
    <h2 class="heading">Login</h2>
    
				<form method="post" action="{{route("login")}}">
                    
                    @csrf
                    
                    <!-- Starting The Login Form -->
                    
                        <label class="control-label">Username</label>
                        <input type="text" class="form-control" name="username">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection