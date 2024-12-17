@extends('admin.master')
@section('categories')
<title>Categories</title>
<div class="container">
@isset($success)
    <div class="alert alert-success" style="margin-top: 10px">
        {{$success}}
    </div>  
@endisset
@if(Session::has('success'))
    <div class="alert alert-success" style="margin-top: 10px">
        {{Session::get('success')}}
    </div>  
@endif
<div class="categories"> 
<h2 class="heading">Categories</h2>
    <div class="category">
        <div class="panel">
            <div class="panel-heading">
                <i class="fa fa-cube"></i>
                <span>Categories</span>
            </div>
            <div class="panel-body">
            @php 
                if(count($categories) == 0)
                { @endphp
                <div class="alert alert-danger">
                    {{$error}}
                </div> @php } 
            @endphp
            @foreach($categories as $category)
                <div class="media">
                    <div class="media-left">
                        <img src="../admin/layout/images/categories/{{$category->image}}"
                             class="media-object" style="width: 100px; height: 100px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$category -> name}}</h4>
                        <p>{{$category -> description}}</p>
                    </div>
                
                <a href="{{route('category_edit', $category -> id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('category_delete', $category -> id)}}" 
                   class="category-delete btn btn-info"><i class="fa fa-close"></i>Delete</a>
                <a href="{{route('show_subcategories', $category -> id)}}" class="btn btn-info">
                    <i class="fa fa-cubes"></i>Show Sub-Categories</a>
                    
                </div>
                <hr>
            @endforeach
            </div>
        </div>
        <a href="{{url('admin/category_add')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>New Category</a>
	</div>				 
</div>
</div>
@endsection