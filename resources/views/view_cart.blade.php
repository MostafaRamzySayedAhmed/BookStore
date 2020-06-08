@extends('master')
@section('view_cart')
<title>Book Store</title>
<div class="container">
@if(Session::has('success'))
    <div class="alert alert-success" style="margin-top: 10px">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" style="margin-top: 10px">
        {{Session::get('error')}}
    </div>
@endif
        <table class='view_cart table table-bordered table-hover table-responsive'>
            
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Sub-Category Name</th>
                <th>Category Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
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
                <td><a href='{{route('delete_cart', $cart->id)}}'
                       class='cart-delete btn btn-danger'>
                    <i class='fa fa-close'></i>Delete</a>
                    <a href='{{route('edit_cart', $cart->id)}}' class='btn btn-primary'><i class='fa fa-edit'></i>Edit Quantity</a>
                </td>
            </tr>
            @endforeach     
            
        </table>
@if(count($carts) == 0)
    <div class="alert alert-danger" style="margin-top: 10px">
        {{$error}}
    </div>
@else
<a href="{{route('proced')}}" class="proced btn btn-primary">Proced To Buy</a>  
@endif
</div>
@endsection