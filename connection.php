<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);

if($conn){
  ?>  
<!-- <script>alert('Connection Successful')</script> -->
<?php
}
else{
    die("Connection failed: " . mysqli_connect_error());
}
?>
