@extends('admin.master')
@section('category_subcategories')
<title>Sub-Categories</title>
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
<div class="subcategories"> 
<h2 class="heading">Sub-Categories</h2>
    <div class="subcategory">
        <div class="panel">
            <div class="panel-heading">
                <i class="fa fa-cubes"></i>
                <span>{{$category -> name}}</span>
            </div>
            <div class="panel-body">
            @php 
                if(count($subcategories) == 0)
                { @endphp
                <div class="alert alert-danger">
                    {{$error}}
                </div> @php } 
            @endphp
            @foreach($subcategories as $subcategory)
                <div class="media">
                    <div class="media-left">
                        <img src="../admin/layout/images/subcategories/{{$subcategory->image}}"
                             class="media-object" style="width: 100px; height: 100px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$subcategory -> name}}</h4>
                        <p>{{$subcategory -> description}}</p>
                    </div>
                    
                    
                <a href="{{route('show_books', $subcategory -> id)}}" class="btn btn-info"><i class="fa fa-book"></i>Show Books</a>
                <a href="{{route('subcategory_edit', $subcategory -> id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('subcategory_delete', $subcategory -> id)}}"
                   class="subcategory-delete btn btn-info"><i class="fa fa-close"></i>Delete</a>
                </div>
                <hr>
            @endforeach
            </div>
        </div>
        <a href="{{url('admin/subcategory_add')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>New Sub-Category</a>
	</div>				 
</div>
</div>
@endsection