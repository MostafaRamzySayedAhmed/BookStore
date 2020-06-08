@extends('admin.master')
@section('users')
<title>Users</title>
<div class="container">
@isset($success)
    <div class="alert alert-success" style="margin-top: 20px">
        {{$success}}
    </div>
@endisset
@if(Session::has('success'))
    <div class="alert alert-success" style="margin-top: 10px">
        {{Session::get('success')}}
    </div>  
@endif
<div class="users"> 
<h2 class="heading">Users</h2>
    <div class="user">
        <div class="panel">
            <div class="panel-heading">
                <i class="fa fa-user"></i>
                <span>Users</span>
            </div>
            <div class="panel-body">
            @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endisset
            @foreach($users as $user)
                <div class="content">
                <h2>{{$user -> username}}</h2>
                <span>{{$user -> first_name}} {{$user -> last_name}}</span>
                <a href="{{route('user_edit', $user -> id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('user_delete', $user -> id)}}" class="user-delete btn btn-info">
                    <i class="fa fa-close"></i>Delete</a>
                @if($user -> registration_status == '0')
                <a href="{{route('user_activate', $user -> id)}}" class="btn btn-info">
                    <i class="fa fa-key"></i>Activate</a>
                @else
                <a href="{{route('user_deactivate', $user -> id)}}" class="btn btn-info">
                    <i class="fa fa-lock"></i>Deactivate</a>
                @endif
                </div>
                <hr>
            @endforeach
            </div>
        </div>
        <a href="{{url('admin/user_add')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>New User</a>
	</div>				 
</div>
</div>
@endsection