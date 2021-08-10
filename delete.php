<?php
session_start();
require 'partials/_dbconnect.php';

if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true) {
       header("location: index.php");
       exit;
     }
$snodelete = $_GET['sno'];

// sql to delete a record
//$sql = "DELETE FROM mechanical WHERE id='$snodelete'";

$sql=mysqli_query($conn, "DELETE FROM `mechanical` WHERE `mechanical`.`sno` = $snodelete");

if ($sql) {
    echo"<script>
    alert('Question deleted successfully');
    window.location.href='/pocket/viewmechanical.php';     
    </script>";
   mysqli_close($conn); // Close connection
   exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>