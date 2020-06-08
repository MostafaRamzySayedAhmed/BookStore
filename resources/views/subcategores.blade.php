@extends('master')
@section('subcategories')
<title>Book Store</title>
<div class="container">
    <div class="row">
     @foreach($subcategores as $subcategory)
        
            <div class="show_subcategory col-sm-6 col-md-4 col-lg-3">
            <div class="first">
            <a href="{{route('subcategory_books',$subcategory -> id)}}"><h2 class="text-center">
                {{$subcategory->name}}</h2></a>
            </div>
            <div class="second">
            <a href="{{route('subcategory_books',$subcategory -> id)}}"><img class="image"
            src="<?php echo "../admin/layout/images/subcategories/" ?>{{$subcategory->image}}"></a>
            </div>
            </div>
        
     @endforeach
    </div>
</div>
@endsection