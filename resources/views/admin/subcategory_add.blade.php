@extends('admin.master')
@section('subcategory_add')
<title>New Sub-Category</title>
<div class="subcategory_add">
 <div class="container">
     
    <h2 class="heading">New Sub-Category</h2>
    
				<form method="post" action="{{url('admin/subcategory_insert')}}" enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Sub-Category Adding Form -->
                        
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" required maxlength="100">
                        @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" required maxlength="100">
                        @error('description')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <select class="form-control" name="categories" required>
                                @foreach($categories as $category)
                                    <option value="{{$category -> id}}">{{$category -> name}}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="submit" value="New Sub-Category" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection