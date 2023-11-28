<?php
session_start();
include 'connection.php';
$id="";
$name="";
$loc="";
$hod="";
$img="";
$remark="";

$edit_state = false;


if(isset($_GET['delete'])){

$id=$_GET['delete'];

$sql="DELETE FROM department WHERE dept_id='$id' ";
mysqli_query($conn,$sql);
}

if(isset($_GET['update']))
{
  $edit_state = true;
  $id=$_GET['update'];
$s="SELECT * FROM department WHERE dept_id='$id'";
$q=mysqli_query($conn,$s);
$record=mysqli_fetch_array($q);
$id=$record['dept_id'];
$name=$record['dept_name'];
$loc=$record['location'];
$hod=$record['hod'];
$img=$record['dept_img_path'];
$remark=$record['remark'];

}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Details</title>
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
        <li class="nav-item active">
        <a class="nav-link waves-effect waves-light" href="dept.php"><i class="fas fa-swatchbook me-2"></i>Department
            <span class="sr-only">(current)</span>
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="course.php"><i class="fas fa-university me-2"></i>Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="student.php"><i class="fas fa-user-graduate me-2"></i>Students</a>
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
if(isset($_POST['dept_update']))
{
$id=$_GET['update'];
$dept_id = mysqli_real_escape_string($conn,$_POST['dept_id']);
$name = mysqli_real_escape_string($conn, $_POST['dept_name']);
$loc = mysqli_real_escape_string($conn,$_POST['loc']);
$hod = mysqli_real_escape_string($conn,$_POST['hod']);
$img = mysqli_real_escape_string($conn,$_POST['img']);
$remark = mysqli_real_escape_string($conn,$_POST['remark']);

$sql="UPDATE department SET dept_id='$dept_id',dept_name='$name',location='$loc',hod='$hod',dept_img_path='$img', Remark='$remark' WHERE dept_id='$id' ";

mysqli_query($conn,$sql)
?>
  <script> alert ('Record inserted successfully'); </script>
  <?php
  header('location:dept.php');
}

elseif(isset($_POST['dept_insert']))
{
  
$id=$_POST['dept_id'];
$name=$_POST['dept_name'];
$loc=$_POST['loc'];
$hod=$_POST['hod'];
$img=$_POST['img'];
$remark=$_POST['remark'];

$sql="INSERT INTO department(dept_id,dept_name,location,hod ,dept_img_path,remark) values('$id','$name','$loc','$hod','$img','$remark')";
$query = mysqli_query($conn,$sql);
if($query)
{
  ?>
  <script> alert ('Record inserted successfully'); </script>
  <?php
}
header('location:dept.php');
}
  ?>

<!-- display table -->

<div class="container">
<br><br>
    <h1 class="text-warning text-center">Departments Details</h1>
  <div class= "col-lg-12 table-responsive">
    
<br>
  <table class="table table-striped table-hover table-bordered text-center">
    <thead class =" text-white bg-dark">
<th>Depaetment ID</th>
<th>Department Name</th>
<th>Location</th>
<th>HOD</th>
<th>Image/Path</th>
<th>Remarks</th>
<th>Delete</th>
<th>Update</th>
    </thead>
    <tbody>

<?php



$sql="SELECT * from department";
$query=mysqli_query($conn,$sql);

while($res=mysqli_fetch_array($query)){


?>
<tr>
<td><?php echo $res['dept_id'] ?></td>
<td><?php echo $res['dept_name'] ?></td>
<td><?php echo $res['location'] ?></td>
<td><?php echo $res['hod'] ?></td>
<td><?php echo $res['dept_img_path'] ?></td>
<td><?php echo $res['remark'] ?></td>
<td><button class="btn-danger btn" name="delete"><a href="dept.php?delete=<?php echo $res['dept_id'];?>" class="text-white"> Delete</a></button></td>
<td><button class="btn-primary btn" name='update'><a href="dept.php?update=<?php echo $res['dept_id'];?>"class="text-white">Update</a></button></td>

</tr>
<?php
}
?>


    </tbody>
  </table>
  </div>
</div>

 
<!-- insert form -->
<div class= "col-lg-6 m-auto">
  <form action="#" method="POST">
    <div class="card">
      <br>
      <div class="card-header bg-dark">
  
        <h2 class="text-white text-center">Insert Department records</h2>   
      </div>
      <div class="card-header text-dark bg-info">
      <div>
<br>
 <label for="dept_id">Department ID : </label>
  <input type="text" name="dept_id" class="form-control"  placeholder="Enter Department ID" required=""  value="<?php echo $id; ?>">
  <br>
  <label for="fname">Department Name : </label>
  <input type="text" name= "dept_name" class="form-control"  placeholder="Department" required="" value="<?php echo $name;?>">
 
</div>
<br>
<div class="input_group">
					<input type="text" name="loc" class="form-control" placeholder="Location" required=""  value="<?php echo $loc;?>">
				</div><br>


<div class="input_group">
					<input type="text" name="hod" class="form-control"  placeholder="Head of department" required="" value="<?php echo $hod;?>">	
</div><br>
<div class="input_group">
					<input type="text" name="img" class="form-control"  placeholder="Image Path" required="" value="<?php echo $img;?>">	
</div><br>
<div class="input_group">
					<input type="text" name="remark" class="form-control" placeholder="Remarks"  required=""value="<?php echo $remark;?>">
				</div><br> 

<div class="input_group">
				<?php
if($edit_state == false){
?>
<button type="submit" name="dept_insert" class="btn btn-primary btn-large">Save</button>
<?php
}
else{
  ?>
<button type="submit" name="dept_update" class="btn btn-primary btn-large">Update</button>
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