@extends('admin.master')
@section('category_add')
<title>New Category</title>
<div class="category_add">
 <div class="container">
     
    <h2 class="heading">New Category</h2>
    
				<form method="post" action="{{url('admin/category_insert')}}" enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Category Adding Form -->
                        
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
                            <label class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="submit" value="New Category" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection