<?php
session_start();
include 'connection.php';
$id="";
$fname="";
$lname="";
$gender="";
$phone="";
$addr="";
$mail="";
$branch="";
$sem="";
$course="";
$remark="";
$dob="";
$edit_state=false;

if(isset($_GET['delete'])){

    $id=$_GET['delete'];
    
    $sql="DELETE FROM student WHERE s_id='$id' ";
    mysqli_query($conn,$sql);
    header('location:student.php');
    }

    if(isset($_GET['update']))
    {
      $edit_state = true;
      $id=$_GET['update'];
    $s="SELECT * FROM student WHERE s_id='$id'";
      $q=mysqli_query($conn,$s);
    $record=mysqli_fetch_array($q);
    $id=$record['s_id'];
    $fname=$record['f_name'];
    $lname=$record['l_name'];
    $gender=$record['gender'];
    $dob=$record['dob'];
    $addr=$record['address'];
    $phone=$record['phone'];
    $mail=$record['email'];
    $branch=$record['branch'];
    $sem=$record['sem'];
    $course=$record['c_name'];
    $remark=$record['remark'];

   
    
    }
    

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
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
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" >
      <img
        src="img/logo.png"
        height="50"
        alt="CMS"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler "
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse " id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
          
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="admin.php"><i class="fas fa-home me-2"> </i>Home
         </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link waves-effect waves-light" href="dept.php"><i class="fas fa-swatchbook me-2"></i>Department
            
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="course.php"><i class="fas fa-university me-2"></i>Course</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link waves-effect waves-light" href="student.php"><i class="fas fa-user-graduate me-2"></i>Students
          <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="faculty.php"><i class="fas fa-chalkboard-teacher me-2"></i>Faculty</a>
        </li>
      </ul>
     
     <!-- Avatar -->
<div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <i class="fas fa-user-circle me-2"></i> 
        <?php 
echo $_SESSION['username'];
        ?>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
   

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<?php
if(isset($_POST['student_update']))
{
  $id=$_GET['update'];
$sid = mysqli_real_escape_string($conn,$_POST['sid']);
$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$branch = mysqli_real_escape_string($conn,$_POST['branch']);
$sem = mysqli_real_escape_string($conn,$_POST['sem']);
$couse = mysqli_real_escape_string($conn,$_POST['course']);
$mail= mysqli_real_escape_string($conn,$_POST['email']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$remark = mysqli_real_escape_string($conn,$_POST['remark']);

$sql="UPDATE student SET s_id='$sid',f_name='$fname',l_name='$lname',gender='$gender',dob='$dob',address='$address',phone='$phone',email='$mail',branch='$branch',sem='$sem',c_name='$course',remark='$remark' WHERE s_id='$id' ";

mysqli_query($conn,$sql);
?>
  <script> alert ('Record inserted successfully'); </script>
  <?php
  header('location:student.php');
}

elseif(isset($_POST['student_insert']))
{
  $id=$_POST['sid'];
  $f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
  $phone=$_POST['phone'];
	$gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $branch=$_POST['branch'];
	$sem=$_POST['sem'];
  $course=$_POST['course'];
	$mail=$_POST['email'];
  $addr=$_POST['address'];
	$remark=$_POST['remark'];
 
  
  $sql="INSERT INTO student (s_id,f_name,l_name,gender,dob,address,phone,email,branch,sem,c_name,remark) values('$id','$f_name','$l_name','$gender','$dob','$addr','$phone','$mail','$branch','$sem','$course','$remark')";
  $query = mysqli_query($conn,$sql);
  if($query)
  {
    ?>
    <script> alert ('Record inserted successfully'); </script>
    <?php
  }
  header('location:student.php');
}
    ?>

    <!-- display table -->

<div class="container">
<br><br>
    <h1 class="text-warning text-center">Students Details</h1>

  <div class= "col-lg-12 table-responsive">
     <br>
  <table class="table table-striped table-hover table-bordered text-center">
    <thead class =" text-white bg-dark">
<th>Student ID</th>
<th>First Name</th>
<th>Last_Name</th>
<th>Gender</th>
<th>DOB</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Branch</th>
<th>Semester</th>
<th>Course Name</th>
<th>Remarks</th>
<th>Delete</th>
<th>Update</th>
    </thead>
    <tbody>

<?php



$sql="SELECT * from student";
$query=mysqli_query($conn,$sql);

while($res=mysqli_fetch_array($query)){


?>
<tr>
<td><?php echo $res['s_id'] ?></td>
<td><?php echo $res['f_name'] ?></td>
<td><?php echo $res['l_name'] ?></td>
<td><?php echo $res['gender'] ?></td>
<td><?php echo $res['dob'] ?></td>
<td><?php echo $res['address'] ?></td>
<td><?php echo $res['phone'] ?></td>
<td><?php echo $res['email'] ?></td>
<td><?php echo $res['branch'] ?></td>
<td><?php echo $res['sem'] ?></td>
<td><?php echo $res['c_name'] ?></td>
<td><?php echo $res['remark'] ?></td>

<td><button class="btn-danger btn" name="delete"><a href="student.php?delete=<?php echo $res['s_id'];?>" class="text-white"> Delete</a></button></td>
<td><button class="btn-primary btn" name='update'><a href="student.php?update=<?php echo $res['s_id'];?>"class="text-white">Update</a></button></td>

</tr>
<?php
}
?>


    </tbody>
  </table>
  </div>
</div>


<!-- insert form -->
<div class= "col-lg-11 m-auto">
  <form action="" method="POST">
    <div class="card">
      <br>
      <div class="card-header bg-dark">
  
        <h2 class="text-white text-center">Insert Student records</h2>   
      </div>
      <div class="card-header text-dark bg-info">
      <div>
<br>
 <label for="sid">Student ID : </label>
  <input type="text" name="sid" placeholder="Enter ID" required="" value="<?php echo $id; ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <label for="fname">First Name : </label>
  <input type="text" name= "fname" placeholder="First name" required="" value="<?php echo $fname; ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <label for="lname">Last Name : </label>
  <input type="text" name= "lname"  placeholder="Last name" required="" value="<?php echo $lname; ?>"> 

 
</div>
<br>

<div class="input_group">
					<input type="text" name="phone"  placeholder="Mobile no." required="" value="<?php echo $phone; ?>">
				</div><br>

<div class="input_group">
<input type="text" name="gender" placeholder="Gender" required="" value="<?php echo $gender; ?>">
		</div><br>


    <div class="input_group">
					<input type="text" name="dob" placeholder="Date of birth" required="" value="<?php echo $dob; ?>">
	</div><br><br>

  
<div class="input_group">
					<input type="text" name="branch"  placeholder="Branch" required="" value="<?php echo $branch; ?>">	
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          <input type="text" name="sem"  placeholder="Semester" required="" value="<?php echo $sem; ?>">	
</div><br>

<div class="input_group">
					<input type="text" name="course"  placeholder="Course Name" required="" value="<?php echo $course; ?>">
				</div><br> 

 <div class="input_group">
					<input type="text" name="email" class="form-control" placeholder="Email address" required="" value="<?php echo $mail; ?>">	
</div><br>


<div class="input_group">
					<input type="text" name="address" class="form-control" placeholder="Address" required="" value="<?php echo $addr; ?>">
				</div><br>

        <div class="input_group">
					<input type="text" name="remark" class="form-control" placeholder="Remarks"  required="" value="<?php echo $remark; ?>">
				</div><br> 

 <div class="input_group">
				<?php
if($edit_state == false){
?>
<button type="submit" name="student_insert" class="btn btn-primary btn-large">Save</button>
<?php
}
else{
  ?>
<button type="submit" name="student_update" class="btn btn-primary btn-large">Update</button>
<?php
}
  ?>
  	</div>

</div>
</div>
</form>
</div>


<footer style="background:url(img/footer.jpg) center/cover no-repeat">
    <div class="py-5 text-white" style="background:#000000bb"> 
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <h5>Useful Links</h5>

              <ul class="fa-ul ml-4">
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Home</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>About Us</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Courses</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Terms &amp; Conditions</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
              <h5>Social Presence</h5>

              <div>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
                </span>
              </div>
            </div>
            
          </div>
      </div>
    </div>
  </footer>  
  <section class="py-2 bg-dark text-light">
    <div class="container-fluid">
      Copyright 2022 All Rights Reseved. <a href="#" class="text-light">GECA,AJMER</a>
    </div>
  </section>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
></script>
</body>
</html>