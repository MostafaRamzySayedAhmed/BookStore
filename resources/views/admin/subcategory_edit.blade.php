@extends('admin.master')
@section('subcategory_edit')
<title>Edit Sub-Category</title>
<div class="subcategory_edit">
 <div class="container">
     
    <h2 class="heading">Edit Sub-Category</h2>
    
    <form method="post" action="{{route('subcategory_update', $subcategory -> id)}}" 
          enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Sub-Category Editing Form -->
                        
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" required maxlength="100" value="{{$subcategory -> name}}">
                        @error('name')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" required maxlength="100" value="{{$subcategory -> description}}">
                        @error('description')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                         <div class="form-group">
                            <label class="control-label">Category</label>
                            <select class="form-control" name="categories">
                                @foreach($categories as $category)
                                
                <option value="{{$category -> id}}"
    <?php 
                        if($category -> id == $subcategory -> category_id)
                            echo 'selected'
    ?>
                        > {{$category -> name}} 
                </option>
                                
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
                            <input type="file" class="form-control" name="image" required 
                                   value="{{$subcategory -> image}}">
                        @error('image')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>

                        <input type="submit" value="Edit Sub-Category" class="btn btn-primary btn-block">
 
    </form>		
	 
</div>
</div>
@endsection