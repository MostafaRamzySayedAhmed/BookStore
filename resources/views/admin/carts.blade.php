@extends('admin.master')
@section('carts')
<title>Book Store</title>
<div class="container">

        <table class='carts table table-bordered table-hover table-responsive'>
            
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Sub-Category Name</th>
                <th>Category Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Customer</th>
                <th>Controls</th>
            </tr>
            
            @foreach($carts as $cart)
            <tr>
                <td>{{$cart->id}}</td>
                <td>{{$cart->book_name}}</td>
                <td>{{$cart->subcategory_name}}</td>
                <td>{{$cart->category_name}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td>{{$cart->total}}</td>
                <td>{{$username}}</td>
                <td><a href='{{route('cart_delete', $cart->id)}}'
                       class='cart-delete btn btn-danger'>
                    <i class='fa fa-close'></i>Delete</a>
                </td>
            </tr>
            @endforeach     
            
        </table>
    
@if(count($carts) == 0)
    <div class="alert alert-danger" style="margin-top: 10px">
        {{$error}}
    </div>
@endif
</div>
@endsection