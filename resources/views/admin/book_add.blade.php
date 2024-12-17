@extends('admin.master')
@section('book_add')
<title>New Book</title>
<div class="book_add">
 <div class="container">
     
    <h2 class="heading">New Book</h2>
    
				<form method="post" action="{{url('admin/book_insert')}}"
                      enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- Starting The Book Adding Form -->
                        
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
                            <label class="control-label">Publisher</label>
                            <input type="text" class="form-control" name="publisher" required maxlength="100">
                        @error('publisher')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Edition</label>
                            <input type="number" class="form-control" name="edition" required maxlength="10" min="1">
                        @error('edition')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Nuumber of Pages</label>
                            <input type="number" class="form-control" name="number_pages" required maxlength="10" min="1">
                        @error('number_pages')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="number" class="form-control" name="price" required maxlength="10" min="1">
                        @error('price')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Sub-Category</label>
                            <select class="form-control" name="subcategories" required>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory -> id}}">{{$subcategory -> name}}</option>
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
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <input type="submit" value="New Book" class="btn btn-primary btn-block">
 
				</form>		
	 
</div>
</div>
@endsection