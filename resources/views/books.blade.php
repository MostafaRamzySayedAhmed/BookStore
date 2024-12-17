@extends('master')
@section('books')
<title>Book Store</title>
<div class="container">
    <div class="row">
     @foreach($books as $book)
        
            <div class="show_books col-sm-6 col-md-4 col-lg-3">
            <div class="first">
                <a href="{{route('book_details',$book -> id)}}"><h2 class="text-center">
                {{$book->name}}</h2></a>
            </div>
            <div class="second">
                <a href="{{route('book_details',$book -> id)}}"><img class="image"
                src="../admin/layout/images/books/{{$book->image}}"></a>
            </div>
            
            </div>
        
     @endforeach
    </div>
</div>
@endsection