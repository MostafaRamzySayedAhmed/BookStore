@extends('master')
@section('cart')
<title>Book Store</title>
<div class="container">
    <div class="row">
        <form method="post" action="{{route('calculate', $book->id)}}">
            @csrf
            <div class="book_cart">
                <h2>{{$book->name}}</h2>
                <p><span class="description">Description: </span>{{$book->description}}</p>
                <p><span class="price">Price: </span>{{$book->price}}<span class="dollar">$</span></p>
                <input type="number" name="quantity" value="1" required min="1" maxlength="10">
                @error('quantity')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                <p><span class="subcategory">Sub-Category: </span>{{$subcategory->name}}</p>
                <P><span class="category">Category: </span>{{$category->name}}</P>
                <input type="submit" class="btn btn-primary" value="Calculate">
            </div>
        </form>
    </div>
</div>
@endsection