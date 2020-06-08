@extends('master')
@section('question')
<title>Question</title>
<div class="question">
 <div class="container">
     
                <h2>Add Your Question</h2>
    
				<form method="post" action="{{route('question_insert')}}">
                    
                    @csrf
                    
                    <!-- Starting The Question Form -->
                         
                        <div class="form-group">
                        <label class="control-label">Question</label>
                        <textarea rows="4" class="form-control"
                                  placeholder="Type Your Question Here" name="question"></textarea>
                        <input type="submit" value="Submit" max-length="100" class="btn btn-primary btn-block">
                        @error('question')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </div>
                        
				</form>		
	 
</div>
</div>
@endsection