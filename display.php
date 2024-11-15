<?php 
  session_start();
  if(!isset($_SESSION['username']))
  {
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>

    <style>
      h1{
        font-size: 2.5em;
        color:  #4CAF50;
      }

      body {
         font-family: Arial, sans-serif;
         display: flex;
         flex-direction: column;
         align-items: center;
         height: 100vh;
         margin: 0;
         background-color: #f2f2f2;;
    }

      button {
        width: 40%;
        padding: 10px;
        font-size: 1em;
        color: white;
        background-color: #4CAF50; 
        border: none;
        border-radius: 5px;
       cursor: pointer;
       transition: background-color 0.3s ease;
       
}

button:hover {
    background-color: #388E3C; 
}

.table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        font-size: 1em;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      .table th, .table td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd;
      }

      .table th {
        background-color: #4CAF50;
        color: white;
      }

      .table tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      .table tr:hover {
        background-color: #f1f1f1;
      }

      .table button {
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 0.9em;
        transition: background-color 0.3s ease;
      }

      .table button a {
        color: white;
        text-decoration: none;
      }

      .table button:hover {
        background-color: #d32f2f;
      }

      .back{
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    text-align: center;
    background-color: #4CAF50; /* Green background color */
    padding: 15px 0;
    color: white;
    font-size: 1.2em;
    text-decoration: none;
   
  }

  .back:hover {
    background-color: #388E3C; /* Darker green on hover */
}
  
    </style>

</head>
<body>
    <h1>Welcome  
     <?php
        echo $_SESSION["username"] ;
     ?>
    </h1>

    
    <button onclick ="location.href ='http://localhost/php%20todo/event.php'">Add events</button> 

    <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Event</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  

  <?php 
     include "connect.php";
      
     $sql ="select * from `events`";
     $result = mysqli_query($con, $sql);

     if($result)
     {
       while($row = mysqli_fetch_assoc($result))
       {
        $id = $row['id'];
        $event =$row['event'];

        echo '<tr>
           
                       <td>'. $event .'</td>
                        <td> 
                           
                           <button><a href="delete.php? deleteid='.$id.'" >Done</a></button>
                       </td>
                      </tr>
                      <br>
        ';
       }
     }
  ?>
 <button onclick ="location.href ='Home.html'" class="back">Log out</button> 
  </body>
</html>