@extends('master')
@section('book_details')
<title>Book Store</title>
<div class="container">
    <div class="row">
     @foreach($book_details as $book_detail)
        
            <div class="show_book_details">
                
            <div class="first">
                <h2>{{$book_detail -> name}}</h2>
                <p><span class="description">Dscription: </span>{{$book_detail -> description}}</p>
                <p><span class="publisher">Publisher: </span>{{$book_detail -> publisher}}</p>
                <p><span class="edition">Edition: </span>{{$book_detail -> edition}}</p>
                <p><span class="number">Number of Pages: </span>{{$book_detail -> number_pages}}</p>
                <p><span class="price">Price: </span>{{$book_detail -> price}}<span class="dollar">$</span></p>
            </div>
            <div class="second">
                <img class="image" src="../admin/layout/images/books/{{$book_detail->image}}"{{$book_detail->image}}">
                <a class="btn btn-primary" href="{{route('cart', $book_detail -> id)}}">Add To Cart</a> 
            </div> 
                
            </div>
        
     @endforeach
    </div>
</div>
@endsection