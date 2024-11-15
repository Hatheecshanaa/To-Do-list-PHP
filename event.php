<?php 
include "connect.php";
   if($_SERVER['REQUEST_METHOD']=='POST')
   {
      $event = $_POST['event'];

      $sql = "insert into `events` (event) values ('$event')";
      $result = mysqli_query($con, $sql);

      if($result)
      {
        //echo "data inserted successfully";
        header("location:event.php");
      }

      else {
        die(mysqli_error($con));
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Evenets</title>
    <link rel="stylesheet" href="signup_style.css">
</head>
<body>
    <form method="POST">
        <div> 
            <input type="text" name="event" placeholder="Enter the event" auto_complte="off">
        </div>
        
        <button type="submit">Add</button>
        
    </form>
    <button class="back" onclick ="location.href ='http://localhost/php%20todo/display.php'">Finish</button> 
</body>
</html>