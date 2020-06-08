@extends('admin.master')
@section('book_edit')
<title>Edit Book</title>
<div class="book_edit">
 <div class="container">
     
    <h2 class="heading">Edit Book</h2>
    
    <form method="post" action="{{route('book_update', $book -> id)}}" 
          enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Book Editing Form -->
                        
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" required maxlength="100" value="{{$book -> name}}">
                        @error('name')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" required maxlength="100" value="{{$book -> description}}">
                        @error('description')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                        <div class="form-group">
                            <label class="control-label">Publisher</label>
                            <input type="text" class="form-control" name="publisher" required maxlength="100" value="{{$book -> publisher}}">
                        @error('publisher')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                        <div class="form-group">
                            <label class="control-label">Edition</label>
                            <input type="number" min="1" class="form-control" name="edition" required maxlength="100" value="{{$book -> edition}}">
                        @error('edition')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                        <div class="form-group">
                            <label class="control-label">Number of Pages</label>
                            <input type="number" min="1" class="form-control" name="number_pages" required maxlength="100" value="{{$book -> number_pages}}">
                        @error('number_pages')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="number" min="1" class="form-control" name="price" required maxlength="100" value="{{$book -> price}}">
                        @error('price')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
        
                         <div class="form-group">
                            <label class="control-label">Sub-Category</label>
                            <select class="form-control" name="subcategories">
                                @foreach($subcategories as $subcategory)
                                
                <option value="{{$subcategory -> id}}"
    <?php 
                        if($subcategory -> id == $book -> subcategory_id)
                            echo 'selected'
    ?>
                        > {{$subcategory -> name}} 
                </option>
                                
                                @endforeach
                             </select>
                            @error('subcategories')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" required 
                                   value="{{$book -> image}}">
                        @error('image')
                            <div class="alert alert-danger" style="margin-top: 10px">
                                {{$message}}
                            </div>
                        @enderror
                        </div>

                        <input type="submit" value="Edit Book" class="btn btn-primary btn-block">
 
    </form>		
	 
</div>
</div>
@endsection