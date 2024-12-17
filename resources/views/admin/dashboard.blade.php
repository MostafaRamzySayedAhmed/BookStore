@extends('admin.master')
@section('dashboard')
<title>Book Store</title>
<div class="container">
    <h1 class="heading_statics">Dahboard</h1>
    <div class="row">
        
            <div class="show_statics">
             <div class="panel">
                <div class="panel-heading">
                 <i class="fa fa-line-chart"></i>
                 <span>Latest Statics</span>
                </div>
             </div>
                <div class="row">
                <div class="first col-sm-6 col-md-4 col-lg-3">
                    <h2>Total Users</h2>
                    <i class="fa fa-user"></i>
                    <a href ="{{url('admin/users')}}"><span>{{$users_number}}</span></a>
                </div>
                <div class="second col-sm-6 col-md-4 col-lg-3">
                    <h2>Total Categories</h2>
                    <i class="fa fa-cube"></i>
                    <a href ="{{url('admin/categories')}}"><span>{{$categories_number}}</span></a>
                </div>
                <div class="third col-sm-6 col-md-4 col-lg-3">
                    <h2>Total Sub-Categories</h2>
                    <i class="fa fa-cubes"></i>
                    <a href ="{{url('admin/subcategories')}}"><span>{{$subcategories_number}}</span></a>
                </div>
                <div class="fourth col-sm-6 col-md-4 col-lg-3">
                    <h2>Total Books</h2>
                    <i class="fa fa-book"></i>
                    <a href ="{{url('admin/books')}}"><span>{{$books_number}}</span></a>
                </div>
                </div>
            </div>
        <div class="latest">
            <div class="row">
                <div class="first col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <i class="fa fa-user"></i>
                            <span>Latest Users</span>
                        </div>
                        <div class="panel-body">
                            @foreach($latest_users as $latest_user)
                                <div class="latest_users">
                                    <ul>
                                        <li><span>{{$latest_user -> username}}</span><a href="#" class="btn btn-info">Edit</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="second col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <i class="fa fa-book"></i>
                            <span>Latest Books</span>
                        </div>
                        <div class="panel-body">
                            @foreach($latest_books as $latest_book)
                                <div class="latest_books">
                                    <ul>
                                        <li><span>{{$latest_book -> name}}</span><a href="#" class="btn btn-info">Edit</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="third col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <i class="fa fa-cubes"></i>
                            <span>Latest Categories</span>
                        </div>
                        <div class="panel-body">
                            @foreach($latest_categories as $latest_category)
                                <div class="latest_categories">
                                    <ul>
                                        <li><span>{{$latest_category -> name}}</span><a href="#" class="btn btn-info">Edit</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="fourth col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <i class="fa fa-book"></i>
                            <span>Latest Sub-Categories</span>
                        </div>
                        <div class="panel-body">
                            @foreach($latest_subcategories as $latest_subcategory)
                                <div class="latest_subcategories">
                                    <ul>
                                        <li><span>{{$latest_subcategory -> name}}</span>
                                            <a href="#" class="btn btn-info">Edit</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection