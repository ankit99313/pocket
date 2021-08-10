


<?php
$login=true;
$showError=false;
if ($_SERVER["REQUEST_METHOD"]=="POST") {

require 'partials/_dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];

//$sql="Select * from users where username='$username' AND password='$password'";
$sql="Select * from users where username='$username'";

    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if ($num==1) {
      while($row=mysqli_fetch_assoc($result)){
       
        if($password==$row['password']) {
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location:showquestion.php");
           // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
    else{
      echo'alert("Hello! I am an alert box 1!")';
      $login=false;
    }
  }
}
    else {
      //$showError="password do not match";
      echo"<script>
        alert('password do not match');
        </script>";
      $login=false;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
<div class="container">
   <h1  class="text-center">Login</h1>
  
   <form action="/pocket/index.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">User name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your name">
    
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="password">
  </div>
  
  
  <button type="submit" class="btn btn-primary col-md-6 mt-4">Login</button>
</form>
</div>


</body>
</html>







