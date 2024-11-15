<?php 
     include "connect.php";
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $username= $_POST['username'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];

       
   
        $sql = "select * from `signup` where username = '$username'";
        $result = mysqli_query($con, $sql);
   
        if($result)
        {
          $num= mysqli_num_rows($result);
          if($num>0)
          {
            echo'<div class="alert">
            <strong>SORRY!</strong>  The user is aleday exist..
            </div>
            <div class ="back"><button><a href="Home.html">Back To Home</a></button></div>'
            ;
           
          }

          else{
            if($password === $cpassword){
            $sql = "insert into `signup` (username, password)  values('$username', '$password')";
            $result = mysqli_query($con, $sql);

            if($result)
            {
                echo'<div class="success">
            <strong>DONE!</strong> Created successfully.. 
            </div>
            <div class ="back"><button><a href="Home.html">Back To Home</a></button></div> ';
               
            }

            else{
                die(mysqli_error($con, $sql));
            }
          }
          else{
            echo'<div class="alert">
            <strong>SORRY!</strong> Password does not match..
            </div>
            <div class ="back"><button><a href="Home.html">Back To Home</a></button></div>'
            ;
          }
          }
        }
      


   
      }

      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup_style.css">
    
</head>
<body>
<div class ="container">
     <h1>Sign Up</h1>
    
   <form action="signup.php" method ="POST"> 
         <div>
         <label>Username </label>
        <input type="text" name="username" placeholder="Enter the username">
        </div>

        <div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter the password">
        </div>

        <div>
        <label>Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Confirm  password">
        </div>

        <button type="submit">Create Account</button>


    </form>
    </div>
</body>


</html>



