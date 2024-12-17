@extends('master')
@section('calculate')
<title>Book Store</title>
<div class="container">
    <div class="row">
        <form method="post" action="{{route('insert_cart', $book->id)}}">
            @csrf
            <div class="book_calculate">
                <h2>{{$book->name}}</h2>
                <p><span class="description">Description: </span>{{$book->description}}</p>
            <p><span class="price">Price: </span>{{$book->price}}<span class="dollar">$</span></p>
                <input type="hidden" name="quantity" value="{{$quantity}}">
                <p><span class="quantity">Quantity: </span>{{$quantity}}</p>
                @error('quantity')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <p><span class="subcategory">Sub-Category: </span>{{$subcategory->name}}</p>
                <P><span class="category">Category: </span>{{$category->name}}</P>
                <p><span class="total">The Total: </span>{{$total}}<span class="dollar">$</span></p>
                <input type="submit" class="btn btn-primary" value="Confirm">  
            </div>
        </form>
    </div>
</div>
@endsection