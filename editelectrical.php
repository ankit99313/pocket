<?php

 session_start();
 require 'partials/_dbconnect.php';

if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true) {
        header("location: index.php");
        exit;
      }

     


$snoupdate = $_GET['sno'];
    
  
   
    
$showsql ="SELECT * FROM `Electrical` where sno='$snoupdate'"; 
$result=mysqli_query($conn,$showsql);
$row=mysqli_fetch_assoc($result);

//$qry = mysqli_query($conn,"SELECT * FROM `mechanical` where sno='$sno'"); // select query

//$data = mysqli_fetch_array($qry);
//echo $row['question'];
   
if(isset($_POST['update'])) // when click on Update button
{
   $yearupdate=$_POST["yearupdate"];
   $semesterupdate=$_POST["semesterupdate"];
   $subjectupdate=$_POST["subjectupdate"];
   $questionupdate=$_POST["questionupdate"];
   $answerupdate=$_POST["answerupdate"];
   $questionidupdate=$_POST["questionidupdate"];



  

   //$update_query= "UPDATE `mechanical` SET `question` = '$questionupdate',`year`='$yearupdate', `semester`='$semesterupdate', `answer`='$answerupdate', `questionid`='$questionidupdate' WHERE `mechanical`.`sno` = '$snoupdate'";

   $edit=mysqli_query($conn, "UPDATE `Electrical` SET `question` = '$questionupdate',`year`='$yearupdate', `semester`='$semesterupdate', `answer`='$answerupdate', `Id`='$questionidupdate' WHERE `mechanical`.`sno` = '$snoupdate'");

   


   //$edit=mysqli_query($conn, $update_query);


   if($edit)
   {

         echo"<script>
         alert('Question updated successfully');
         window.location.href='/pocket/viewelectrical.php';     
         </script>";
        mysqli_close($conn); // Close connection
        exit;

       
      
   }
  
}

    

   ?>
<!doctype html>
<html>

<head>

   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

   <title> pocket question </title>

   <script src="ckfinder/ckfinder.js" ></script>
   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


   <style>
      form {
         color: green;
         font-family: arial;
         font-size: 110%
      }
   </style>


</head>

<body>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"></script>


   <!--<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>-->

   <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML'></script>

   <script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script>

   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>







   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
         <a class="navbar-brand" href="/pocket/logout.php">Logout</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

   <h5 style="color:blue;text-align:center;" class="mb-4 mt-4"> UPDATE QUESTION </h5>

   <form method="POST">



      <div class="row g-3 align-items-center">



         <div class="col-auto">
            <label class="col-form-label">Question Id:-</label>
         </div>
         <div class="col-auto">
            <input type="text" class="form-control" placeholder="eg. M/14/RAC/01/a" name="questionidupdate"
               value="<?php echo $row['Id'] ?>">
         </div>

         <div class="col-auto">
            <label class="col-form-label">Year:-</label>
         </div>
         <div class="col-auto">
            <input type="number" class="form-control" placeholder="Year" name="yearupdate"
               value="<?php echo $row['year'] ?>">
         </div>


         <div class="col-auto">
            <label class="col-form-label">Semester:-</label>
         </div>
         <div class="col-auto">
            <input type="number" class="form-control" placeholder="semester" name="semesterupdate" required
               value="<?php echo $row['semester'] ?>">
         </div>

         <div class="col-auto">
            <label class="col-form-label">Subject:-</label>
         </div>
         <div class="col-auto">
            <input type="text" class="form-control" placeholder="subject" name="subjectupdate" required
               value="<?php echo $row['subject'] ?>">
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

                           <textarea cols="250" rows="20"
                              name="questionupdate" id="editor1"><?php echo $row['question'] ?></textarea>

                              <script>
       var editor2= CKEDITOR.replace('editor1');
       CKEDITOR.config.extraplugins='colorbutton';
       CKFinder.setupCKEditor(editor2);
       </script>
        
                        </td>

                        <script>
                           CKEDITOR.replace('questionupdate');
                        </script>

                     </tr>
                     <br> <br>
                     <tr>
                        <td>Answer:</td><br>
                        <p><a href="javascript:OpenLatexEditor('testbox','html','')">
                              Add Equation
                           </a></p>
                        <td><textarea cols="250" rows="20" name="answerupdate" id="editor3"><?php echo $row['answer'] ?></textarea>
                        </td>
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


         <input class="btn btn-primary" type="submit" name="update" value="Update">




   </form>
   </div>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

</body>
</hltml>