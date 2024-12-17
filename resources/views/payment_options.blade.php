@extends('master')
@section('payment_options')
<title>Book Store</title>
<div class="container">
@isset($success)
    <div class="alert alert-danger" style="margin-top: 10px">{{$success}}</div>
@endisset
    <div class="payment_options">
        <h3>Please Select an Option of Payment</h3>
        <p><a href="#" class="btn btn-primary"><i class="fa fa-usd"></i>Cash On Delivery</a></p>
        <p><a href="#" class="btn btn-primary"><i class="fa fa-cc-mastercard"></i>Master Card</a></p>
        <p><a href="#" class="btn btn-primary"><i class="fa fa-credit-card"></i>Credit Card</a></p>
        <p><a href="#" class="btn btn-primary"><i class="fa fa-paypal"></i>Pay Pal</a></p>
        <p><a href="#" class="btn btn-primary"><i class="fa fa-cc-visa"></i>Visa</a></p>
    </div>
</div>
@endsection