<?php 
     include "connect.php";
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $username= $_POST['username'];
        $password= $_POST['password'];

       
   
        $sql = "select * from `signup` where username = '$username' and password ='$password'";
        $result = mysqli_query($con, $sql);
   
        if($result)
        {
          $num= mysqli_num_rows($result);
          if($num>0)
          {
            session_start();
            $_SESSION['username']= $username;
            header("location:display.php");
           
          }

          else{
            echo '<div class="alert">
            <strong>OHHH!</strong>  Incorrect password..
            </div>';
            
          }
        }


   
      }

      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signup_style.css">
    
</head>
<body>
<div class ="container">
     <h1>Login</h1>
    
   <form method ="POST"> 
         <div>
         <label>Username </label>
        <input type="text" name="username" placeholder="Enter the username">
        </div>

        <div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter the password">
        </div>

        <button type="submit">Login</button>


    </form>
    </div>
</body>


</html>



