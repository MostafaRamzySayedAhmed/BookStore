@extends('master')
@section('proced')
<title>Book Store</title>
<div class="container">
        <form class="cart_details" method="post" action="{{route('insert_details')}}">
            @csrf
            <p>Please Fill in this Form to Confirm your Order</p>
            <div class="form-group">
            <label class="control-label">Address</label>
            <input type="text" class="form-control" name="address" required maxlength="100">
            @error('address')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <label class="control-label">Postal Code</label>
            <input type="number" min="1" class="form-control" name="postal_code" required maxlength="20">
            @error('postal_code')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <label class="control-label">City</label>
            <input type="text" class="form-control" name="city" required maxlength="100">
            @error('city')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <label class="control-label">State</label>
            <input type="text" class="form-control" name="state" required maxlength="100">
            @error('state')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <label class="control-label">Street</label>
            <input type="text" class="form-control" name="street" required maxlength="100">
            @error('street')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <label class="control-label">Phone</label>
            <input type="number" min="1" class="form-control" name="phone" required maxlength="11">
            @error('phone')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <input type="submit" value="Confirm" class="btn btn-primary btn-block">
        </form>
</div>
@endsection