$(document).ready(function() {
	
	'use strict';
	
	// Hiding The Placeholder On Focusing & Showing It On Bluring
	
	$('[placeholder]').focus(function() {
		
		$(this).attr('data-text', $(this).attr('placeholder'));
		
		$(this).attr('placeholder', '');
		
	}).blur(function() {
		
		$(this).attr('placeholder', $(this).attr('data-text'));
		
	});
    
    // Showing The Password On Checking & Hiding It On Unchecking
    
    $('input[type=checkbox]').change(function() 
    {
       if ($(this).is(':checked')) 
           {
              $(this).siblings('input[type=password]').attr('type', 'text');
           } 
       else
           {
               $(this).siblings('input[type=text]').attr('type', 'password');
           }
   });
    
    // Confirmation Message On Deleting Button
    
    $('.cart-delete').click(function() 
    {
		return confirm("Are You Sure You Want To Delete This Cart ?");
	});
    
    // Showing & Hiding The List Items In The Dropdown Menu Of The Navigation
    
    $('.my-menu').click(function()
    {
       $('.navigation').toggleClass('navigation-padding');
    });
    
});