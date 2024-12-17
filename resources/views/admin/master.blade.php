<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="../admin/layout/css/font-awesome.min.css">
<link rel="stylesheet" href="../admin/layout/css/bootstrap.min.css">
<link rel="stylesheet" href="../admin/layout/css/style.css">
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
        <?php
    
        if(Session::has('Admin'))

        { ?>
          <li><a href="<?php echo url('admin/dashboard') ?>">
              <i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li><a href="<?php echo url('admin/users') ?>">
              <i class="fa fa-users"></i>Users</a></li>
          <li><a href="<?php echo url('admin/books') ?>">
              <i class="fa fa-book"></i>Books</a></li>
          <li><a href="<?php echo url('admin/categories') ?>">
              <i class="fa fa-cube"></i>Categories</a></li>
          <li><a href="<?php echo url('admin/subcategories') ?>">
              <i class="fa fa-cubes"></i>Sub-Categories</a></li>
          <li><a href="<?php echo url('admin/carts') ?>">
              <i class="fa fa-shopping-cart"></i>Carts</a></li>
          <li><a href="<?php echo url('admin/logout') ?>">
              <i class="fa fa-sign-out"></i>Logout</a></li>
        <?php }
        else
        { ?>
            <li><a href="<?php echo url('admin/login') ?>">Login</a></li>
            <li><a href="<?php echo url('admin/about') ?>">About</a></li>
        <?php }
               
          if(Session::has('Admin'))
              
                {
                    $username = Session::get('Admin');
                    echo "<p class='navbar-text'><i class='fa fa-flag'></i>Welcome"." ".$username. "</p>";
                }
            ?>
      </ul>

    </div>
  </div>
</nav>

<div class="slider">
    
</div>

<body>
    
   @yield('login')
   @yield('about')
   @yield('dashboard')
   @yield('categories')
   @yield('books')
   @yield('users')
   @yield('subcategories')
   @yield('category_subcategories')
   @yield('subcategory_books')
   @yield('user_add')
   @yield('user_edit')
   @yield('category_add')
   @yield('category_edit')
   @yield('subcategory_add')
   @yield('subcategory_edit')
   @yield('book_add')
   @yield('book_edit')
   @yield('carts')
    
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

	<script src="../admin/layout/js/jquery.min.js"></script>
	<script src="../admin/layout/js/bootstrap.min.js"></script>
    <script src="../admin/layout/js/jquery.nicescroll.min.js"></script>
    <script src="../admin/layout/js/script.js"></script>
 
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