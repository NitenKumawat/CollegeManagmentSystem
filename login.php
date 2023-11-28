<?php
session_start();
include 'connection.php'

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logint</title>
        <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>

<div class="form-wrapper text-center">
    <br>
    <br>
  <img src="img/logo.png" width="200px" height="200px" style="margin: top 15px;">
  <br>
	<h2>Admin Login</h2>
  <br>
  <div class="container" style="max-width:500px">
	<form action="login.php" method="post">
	E-mail<input type="id" name="id" class="form-control" placeholder="E-mail or Username" required="" >
  
  <br>
  Password<input type="password" name="pass" class="form-control" placeholder="Password" required="">
    <br>
    <input style="margin-right:10px" type="submit" value="Login" class="btn btn-lg btn-primary" name="login">
    <br>
	</form>
	</div>
  
  <?php
	if (isset($_POST['login']))
		{
      

			$id = mysqli_real_escape_string($conn, $_POST['id']);
			$password = mysqli_real_escape_string($conn, $_POST['pass']);
      
			
			$query 		= mysqli_query($conn, "SELECT * FROM user WHERE  password='$password' and (email='$id' or username ='$id')");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['email']=$row['email'];
          $_SESSION['username']=$row['username'];
          $_SESSION['password']=$row['password'];
					header('location:admin.php');
					
				}
			else
				{
					echo 'Invalid User and Password Combination';
				}
		}
  ?>
  

  
  
   </div>    

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script>
</body>
</html>