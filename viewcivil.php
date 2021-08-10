<?php
session_start();
if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true) {
    header("location: index.php");
    exit;
  }

    ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


        <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML'></script>

      

 

    <title>Civil</title>
</head>

<body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML'></script>


<div class="col-md-12 text-center my-4">

<a class="btn btn-primary" href="/pocket/showquestion.php" role="button">Home</a>
<a class="btn btn-primary" href="/pocket/logout.php" role="button">Logout</a>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

        <h5 class="text-center">Civil Question</h5>

        <div class="my-4">        
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">ID</th>
                <th scope="col">Year</th>
                <th scope="col">Semester</th>
                <th scope="col">Subject</th>
                <th scope="col">Question</th>
                <th scope="col">Answer</th>
               
                <th scope="col">Edit</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
        require 'partials/_dbconnect.php';
        $sq= "SELECT * FROM `Civil`";
        $result=mysqli_query($conn, $sq);
       $sno=0;
   while($row=mysqli_fetch_assoc($result)){
       
      
       $sno=$sno+1;

       ?>
      
 
     <tr>
   
  
    <th scope='row'><?php echo $sno; ?></th>

    <td><?php echo $row['Id']; ?></td>
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['semester']; ?></td>
    <td><?php echo $row['subject']; ?></td>
    <td><?php echo $row['question']; ?></td>
    
   

    <td><?php echo $row['answer']; ?></td>
    
  
   <td> <a class="btn btn-primary" href="/pocket/editcivil.php?sno=<?php echo $row['sno']; ?>" role="button">Edit</a>

   </td>
    

    
</tr>
    
  <?php }
  ?>





        </tbody>
    </table>
    </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>

        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
        </script>
        
        
        <script>

(function() {
    var allimgs = document.images;
    for (var i = 0; i < allimgs.length; i++) {
        allimgs[i].onerror = function() {
            this.style.visibility = "hidden"; // Other elements aren't affected. 
        }
    }
})();
</script>
        
     
</body>

</html>