<?php
include "../includes/header.php";
include "config.php";
?>
<title>Book Details</title>
<div class="details">
 <div class="container">
     
    <?php
		      if(isset($_GET['id']) && is_numeric($_GET['id']))
		   
                   {

                       $id = intval($_GET['id']);
                   }

               else

                   {
                       $id = 0;
                   }
     
                // Preparing The SQL Statement    
    
                $stmt = $conn->prepare("SELECT * FROM books WHERE id = ". $id);

                // Executing The Statement

                $stmt->execute();

                // Assigning To Variable 

                $rows = $stmt->fetchAll();
     ?>
                
    <?php
               foreach($rows as $row)
               {
                   echo "<div class='book_details'>";
                   echo "<h2 class='name'>". $row['name']. "</h2>";
                   echo "<span>Description: </span>". "<p class='description'>". $row['description']. "</p>";
                   echo "<span>Publisher: </span>". "<p class='publisher'>". $row['publisher']. "</p>";
                   echo "<span>Edition: </span>". "<p class='edition'>". $row['edition']. "</p>";
                   echo "<span>Number Of Pages: </span>". "<p class='number_pages'>". $row['number_pages']. "</p>";
                   echo "<span>Price: </span>". "<p class='price'>". $row['price']. "<span class='dollar'>$</span></p>";
                   echo "<img class='image' src='../admin/layout/images/books/". $row['image']. "'>";
                   echo "</div>";
               }
    ?>             
                   
                   <hr style="margin-right: 400px">

</div>
</div>