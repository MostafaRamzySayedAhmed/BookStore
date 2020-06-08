@extends('master')
@section('homepage')
<title>Book Store</title>

<script>
    
// Showing The Details Of The Selected Book

    function getDetails(id)
    
        {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                //  console.log("Success");
              }
            };

            xmlhttp.open("get", "ajax/book_details.php?id=" + id, true);
            xmlhttp.send();

        }
    
</script>

<div class="books">
 <div class="container">
    <p id='txtHint'></p>
<div class="row">
            @foreach ($books as $book)
    
    <div class="book col-sm-6 col-md-3">
  
            <a onclick="getDetails('<?php echo $book->id ?>')"><h3 class="text-center">{{$book->name}}</h3></a>
    
            <a onclick="getDetails('<?php echo $book->id ?>')"><img class="image" src="../admin/layout/images/books/{{$book->image}}" title="The Cover Photo of the Book"></a>
            @if(! Session::has('ID'))
            <a href="{{url('/login')}}" class="btn btn-primary">Login to Buy</a>
            @endif
    </div>         
            @endforeach
</div>    
</div>
</div>
@endsection