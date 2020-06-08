@extends('master')
@section('edit_cart')
<title>Edit Cart</title>
<div class="cart_edit">
 <div class="container">
     
    <h2 class="heading">Edit Cart</h2>
    
				<form class="edit_cart" method="post" action="{{route('update_cart', $cart->id)}}">
                @csrf
                    
                    <div class="form-group">
                       <label class="control-label">Quantity</label>
                       <input type="number" min="1" value="{{$cart->quantity}}" name="quantity">
                        <input type="submit" class="btn btn-primary" value="Confirm">
                        @error('quantity')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                </form>	
	 
</div>
</div>
@endsection