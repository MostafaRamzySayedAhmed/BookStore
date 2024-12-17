<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="../layout/css/font-awesome.min.css">
<link rel="stylesheet" href="../layout/css/bootstrap.min.css">
<link rel="stylesheet" href="../layout/css/style.css">
</head>

<nav class="navigation navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo route('homepage') ?>">
            <i class="fa fa-home"></i>Homepage</a></li>
        <?php
    
        if(Session::has('Username'))

        { ?>
          <li><a href="<?php echo url('home') ?>">
              <i class="fa fa-book"></i>Books</a></li>
          <li><a href="<?php echo url('question') ?>">
              <i class="fa fa-question-circle"></i>Quesetion</a></li>
          <li><a href="{{route('view_cart')}}">
              <i class="fa fa-shopping-cart"></i>View Cart</a></li>
        <?php }
        else
        { ?>
            <li><a href="<?php echo url('register') ?>">
                <i class="glyphicon glyphicon-equalizer"></i>Register</a></li>
            <li><a href="<?php echo url('login') ?>">
                <i class="fa fa-sign-in"></i>Login</a></li>
        <?php }
               
          ?>  
		
          <li><a href="<?php echo url('about') ?>">
              <i class="glyphicon glyphicon-info-sign"></i>About Us</a></li>
          <li><a href="<?php echo url('contact') ?>">
              <i class="glyphicon glyphicon-earphone"></i>Contact Us</a></li>
          @php if(Session::has('Username'))
                {
                    $username = Session::get('Username');
          @endphp
                    <ul class="my-menu navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user"></i>
                                {{$username}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{url('profile')}}">
                              <i class="fa fa-user"></i>Profile</a></li>
                          <li><a href="{{url('user_edit')}}">
                              <i class="fa fa-edit"></i>Edit Profile</a></li>
                          <li><a href="{{url('logout')}}">
                              <i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    </ul>
          
             @php       
                }
          @endphp
      </ul>

    </div>
  </div>
</nav>

<div class="slider">
    
</div>

<body>
    
    @yield('about')
    @yield('contact')
    @yield('homepage')
    @yield('index')
    @yield('login')
    @yield('master')
    @yield('register')
    @yield('subcategories')
    @yield('books')
    @yield('book_details')
    @yield('cart')
    @yield('calculate')
    @yield('proced')
    @yield('payment_options')
    @yield('question')
    @yield('view_cart')
    @yield('edit_cart')
    @yield('profile')
    @yield('user_edit')
    
<!-- Footer -->
<footer class="list container-fluid text-center">
    
  <ul class="first">
      <li><a href="<?php echo route('homepage') ?>">Homepage</a></li>
      <li><a href="<?php echo url('contact') ?>">Contact Us</a></li>
      <li><a href="<?php echo url('about') ?>">About Us</a></li>
  </ul>
    
<p>Copyright <i class="fa fa-copyright"></i> 2020 All Right Reserved</p>
    
<ul class="second">
    <li><a title="Facebook" href="#"><i class="fa fa-facebook-square fa-lg"></i></a></li>
    <li><a title="Twitter" href="#"><i class="fa fa-twitter-square fa-lg"></i></a></li>
    <li><a title="LinkedIn" href="#"><i class="fa fa-linkedin-square fa-lg"></a></i></li>
    <li><a title="Google+" href="#"><i class="fa fa-google-plus-square fa-lg"></a></i></li>
</ul>

</footer>

	<script src="../layout/js/jquery.min.js"></script>
	<script src="../layout/js/bootstrap.min.js"></script>
    <script src="../layout/js/jquery.nicescroll.min.js"></script>
    <script src="../layout/js/script.js"></script>
 
 <script>
        
        $("html").niceScroll({
        
        cursorcolor: '#888',
        cursorwidth: '10px',
        cursorborder: '1px solid #1abc9c',
        cursorborderradius: 5,
        scrollspeed: 120
    });
        
</script>
	
</body>
</html>