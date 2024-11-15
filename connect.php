<?php 
   $con = mysqli_connect('localhost','root','','todoPHP');
   
   if(!$con)
   {
    die(mysqli_error($con));
   }
  
  
?>