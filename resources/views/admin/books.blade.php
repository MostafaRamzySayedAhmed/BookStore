@extends('admin.master')
@section('books')
<title>Books</title>
<div class="container">
@isset($success)
    <div class="alert alert-success" style="margin-top: 10px">
        {{$success}}
    </div>
@endisset
<div class="books"> 
<h2 class="heading">Books</h2>
    <div class="book">
        <div class="panel">
            <div class="panel-heading">
                <i class="fa fa-book"></i>
                <span>Books</span>
            </div>
            <div class="panel-body">
            @php 
                if(count($books) == 0)
                { @endphp
                <div class="alert alert-danger">
                    {{$error}}
                </div> @php } 
            @endphp
            @foreach($books as $book)
                <div class="media">
                    <div class="media-left">
                        <img src="../admin/layout/images/books/{{$book->image}}"
                             class="media-object" style="width: 100px; height: 100px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$book -> name}}</h4>
                        <p>{{$book -> description}}</p>
                    </div>
                <a href="{{route('book_edit', $book -> id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('book_delete', $book -> id)}}" class="book-delete btn btn-info">
                    <i class="fa fa-close"></i>Delete</a>
                </div>
                <hr>
            @endforeach
            </div>
        </div>
        <a href="{{url('admin/book_add')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>New Book</a>
	</div>				 
</div>
</div>
@endsection