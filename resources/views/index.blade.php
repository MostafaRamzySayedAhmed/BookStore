@extends('master')
@section('index')
<title>Book Store</title>
<div class="container">
@isset($success)
         <div class="alert alert-success" style="margin-top:10px">
             {{$success}}
         </div>
@endisset
    <div class="row">
     @foreach($categories as $category)
        
            <div class="show_category col-sm-6 col-md-4 col-lg-3">
            <div class="first">
            <a href="{{route('category_subcategories',$category -> id)}}"><h2 class="text-center">{{$category->name}}</h2></a>
            </div>
            <div class="second">
            <a href="{{route('category_subcategories',$category -> id)}}"><img class="image"        src="admin/layout/images/categories/{{$category->image}}"></a>
            </div>
            </div>
    
     @endforeach
    </div>
</div>
@endsection