<?php
session_start();

    if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true) {
      header("location: index.php");
      exit;
    }


    if ($_SERVER["REQUEST_METHOD"]=="POST") {
    require 'partials/_dbconnect.php';

   $branch=$_POST["branch"];
   $year=$_POST["year"];
   $semester=$_POST["semester"];
   $subject=$_POST["subject"];
   $question=$_POST["question"];
   $answer=$_POST["answer"];
   $questionid=$_POST["questionid"];
 
 
   $userna=$_SESSION["username"];
   
  
  

   if($branch=="Mechanical"){
     

    $sql="INSERT INTO `mechanical` (`Id`, `branch`, `year`, `semester`, `subject`, `question`, `answer`, `name`,`date`) VALUES ('$questionid', '$branch', '$year', '$semester', '$subject', '$question', '$answer','$userna', current_timestamp())";

    
    
    $result=mysqli_query($conn,$sql);

    if ($result) {
        echo"<script>
        alert('Question added successfully');
        window.location.href='/pocket/showquestion.php';
        </script>";
      
      
       //header("location: showquestion.php");
    }
   }

   if($branch=="Civil"){

    $sql="INSERT INTO `Civil` (`Id`, `branch`, `year`, `semester`, `subject`, `question`, `answer`, `name`,`date`) VALUES ('$questionid', '$branch', '$year', '$semester', '$subject', '$question', '$answer','$userna', current_timestamp())";

    
    
    $result=mysqli_query($conn,$sql);

    if ($result) {
       
        echo"<script>
        alert('Question added successfully');
        window.location.href='/pocket/showquestion.php';
        </script>";
     
      
       //header("location: showquestion.php");
    }

   }

   if($branch=="Electrical"){

    $sql="INSERT INTO `Electrical` (`Id`, `branch`, `year`, `semester`, `subject`, `question`, `answer`, `name`,`date`) VALUES ('$questionid', '$branch', '$year', '$semester', '$subject', '$question', '$answer','$userna', current_timestamp())";

    
    
    $result=mysqli_query($conn,$sql);

    if ($result) {

      echo"<script>
        alert('Question added successfully');
        window.location.href='/pocket/showquestion.php';
        </script>";
    
      
       //header("location: showquestion.php");
    }

   }

   if($branch=="CSE"){

    
    $sql="INSERT INTO `CSE` (`Id`, `branch`, `year`, `semester`, `subject`, `question`, `answer`, `name`,`date`) VALUES ('$questionid', '$branch', '$year', '$semester', '$subject', '$question', '$answer','$userna', current_timestamp())";

    
    
    $result=mysqli_query($conn,$sql);

    if ($result) {
  
        echo"<script>
        alert('Question added successfully');
        window.location.href='/pocket/showquestion.php';
        </script>";
         //header("location: showquestion.php");
    }
  

   }
   
    }

   ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Pocket</title>

    
    <script src="ckfinder/ckfinder.js" ></script>


    <style>
      form {
         color: green;
         font-family: arial;
         font-size: 110%
      }

      
   </style>
  </head>
  <body>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>



    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML'></script>

<script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>





<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
 <a class="navbar-brand" href="/pocket/logout.php">Logout</a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse"></div>

 <div class="collapse navbar-collapse " id="navbarNav">
   <ul class="navbar-nav navbar-center">
     <li class="nav-item">
       <a class="nav-link active" aria-current="page" href="/pocket/viewcse.php">CSE</a>
     </li>
     <li class="nav-item">
       <a class="nav-link active" href="/pocket/viewelectrical.php">Electrical</a>
     </li>
     <li class="nav-item">
       <a class="nav-link active" href="/pocket/viewmechanical.php">Mechanical</a>
     </li>
     <li class="nav-item">
       <a class="nav-link active" href="/pocket/viewcivil.php">Civil</a>
     </li>
   </ul>
 </div>
</div>
</nav>








<h5 style="color:blue;text-align:center;" class="mb-4 mt-4"> UPLOAD QUESTION </h5>


   


<form action="/pocket/showquestion.php" method="POST">
 



  <!-- Question ID : <input type="text" placeholder="eg. M/14/RAC/01/a" name="questionid">-->


   <div class="row g-3 align-items-center">

 

  <div class="col-auto">
    <label class="col-form-label">Question Id:-</label>
  </div>
  <div class="col-auto">
    <input type="text"  class="form-control" placeholder="eg. M/14/RAC/01/a" name="questionid">
  </div>

  <div class="col-auto">
    <label class="col-form-label">Year:-</label>
  </div>
  <div class="col-auto">
    <input type="number"  class="form-control" placeholder="Year" name="year" >
  </div>


  <div class="col-auto">
    <label class="col-form-label">Semester:-</label>
  </div>
  <div class="col-auto">
    <input type="number"  class="form-control" placeholder="semester" name="semester" required>
  </div>

  <div class="col-auto">
    <label class="col-form-label">Subject:-</label>
  </div>
  <div class="col-auto">
    <input type="text"  class="form-control" placeholder="subject" name="subject">
  </div>
  


  <div class="col-auto">
    <label class="col-form-label">Branch:-</label>
  </div>

  <div class="col-auto">
  <select name="branch" class="form-select" >
  <option selected value="Mechanical">Mechanical</option>
  <option value="Electrical">Electrical</option>
  <option value="CSE">CSE</option>
  <option value="Civil">Civil</option>
</select>
</div>

</div>

   

   
<div class="col-md-12 text-center mb-4">


<div class="row justify-content-center">
 <div class="col-auto">
 <table class="table table-responsive">

   <table class="w-100">
      <tr>
    
         <td>Question:</td><br>
         <td>
   
         <textarea cols="250" rows="20" name="question" id="editor1" required></textarea></td>

         <script>
       var editor2= CKEDITOR.replace('editor1');
       CKEDITOR.config.extraplugins='colorbutton';
       CKFinder.setupCKEditor(editor2);
       </script>
        
        
      </tr>
      <br> <br>
      <tr>
         <td>Answer:</td><br>
         <p><a href="javascript:OpenLatexEditor('testbox','html','')">
Add equation
</a></p>
         <td><textarea cols="250" rows="20" name="answer" id="editor3" required></textarea></td>
         
         <script>
       var editor4= CKEDITOR.replace('editor3');
       CKEDITOR.config.extraplugins='colorbutton';
       CKFinder.setupCKEditor(editor4);
       </script>
      </tr>
   </table>

   </div>
</div>
   <br>
  
   <button class="btn btn-primary" type="submit">Submit</button>
  
</form>
</div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>