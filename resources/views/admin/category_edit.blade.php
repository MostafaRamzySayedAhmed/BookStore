@extends('admin.master')
@section('category_edit')
<title>Edit Category</title>
<div class="category_edit">
 <div class="container">
     
    <h2 class="heading">Edit Category</h2>
    
    <form method="post" action="{{route('category_update', $category -> id)}}" 
          enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Category Editing Form -->
                        
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" required maxlength="100" value="{{$category -> name}}">
                        @error('name')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" required maxlength="100" value="{{$category -> description}}">
                        @error('description')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" required 
                                   value="{{$category -> image}}">
                        @error('image')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>

                        <input type="submit" value="Edit Category" class="btn btn-primary btn-block">
 
    </form>		
	 
</div>
</div>
@endsection