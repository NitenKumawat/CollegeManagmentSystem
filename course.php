<?php
session_start();
include 'connection.php';
$id="";
$name="";
$fee="";
$time="";
$eligible="";
$img="";
$remark="";

$edit_state = false;


if(isset($_GET['delete'])){

$id=$_GET['delete'];

$sql="DELETE FROM course WHERE c_id='$id' ";
mysqli_query($conn,$sql);
header('location:course.php');
}

if(isset($_GET['update']))
{
  $edit_state = true;
  $id=$_GET['update'];
$s="SELECT * FROM course WHERE c_id='$id'";
  $q=mysqli_query($conn,$s);
$record=mysqli_fetch_array($q);
$id=$record['c_id'];
$name=$record['c_name'];
$fee=$record['fee'];
$time=$record['duration'];
$eligible=$record['eligibility'];
$img=$record['c_img_path'];
$remark=$record['Remark'];

}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
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

        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="dept.php"><i class="fas fa-university me-2"></i>Department</a>
        </li>
      
        <li class="nav-item active">
        <a class="nav-link waves-effect waves-light" href="course.php"><i class="fas fa-swatchbook me-2"></i>Courses
            <span class="sr-only">(current)</span>
          </a>
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
if(isset($_POST['course_update']))
{
  $id=$_GET['update'];
$cid = mysqli_real_escape_string($conn,$_POST['c_id']);
$cname = mysqli_real_escape_string($conn, $_POST['c_name']);
$cfee = mysqli_real_escape_string($conn,$_POST['fee']);
$time = mysqli_real_escape_string($conn,$_POST['duration']);
$eligible = mysqli_real_escape_string($conn,$_POST['elig']);
$img = mysqli_real_escape_string($conn,$_POST['img']);
$remark = mysqli_real_escape_string($conn,$_POST['remark']);

$sql="UPDATE course SET c_id='$cid',c_name='$cname',fee='$cfee',duration='$time',eligibility='$eligible', c_img_path='$img' , Remark='$remark' WHERE c_id='$id' ";

mysqli_query($conn,$sql);
?>
  <script> alert ('Record inserted successfully'); </script>
  <?php
  header('location:course.php');
}

elseif(isset($_POST['course_insert']))
{
  
$id=$_POST['c_id'];
$name=$_POST['c_name'];
$fee=$_POST['fee'];
$time=$_POST['duration'];
$eligible=$_POST['elig'];
$imf=$_POST['img'];
$remark=$_POST['remark'];

$sql="INSERT INTO course (c_id,c_name,fee,duration,eligibility,c_img_path,Remark) values('$id','$name','$fee','$time','$eligible','$img','$remark')";
$query = mysqli_query($conn,$sql);
if($query)
{
  ?>
  <script> alert ('Record inserted successfully'); </script>
  <?php
}
header('location:course.php');
}
  ?>

<!-- display table -->

<div class="container">
  <br><br>
<h1 class="text-warning text-center">Course Details</h1>
  <div class= "col-lg-12 table-responsive">
     <br>
  <table class="table table-striped table-hover table-bordered text-center">
    <thead class =" text-white bg-dark">
<th>Course ID</th>
<th>Course Name</th>
<th>Fee</th>
<th>Duration</th>
<th>Eligibility</th>
<th>Image/Path</th>
<th>Remarks</th>
<th>Delete</th>
<th>Update</th>
    </thead>
    <tbody>

<?php



$sql="SELECT * from course";
$query=mysqli_query($conn,$sql);

while($res=mysqli_fetch_array($query)){


?>
<tr>
<td><?php echo $res['c_id'] ?></td>
<td><?php echo $res['c_name'] ?></td>
<td><?php echo $res['fee'] ?></td>
<td><?php echo $res['duration'] ?></td>
<td><?php echo $res['eligibility'] ?></td>
<td><?php echo $res['c_img_path'] ?></td>
<td><?php echo $res['Remark'] ?></td>
<td><button class="btn-danger btn" name="delete"><a href="course.php?delete=<?php echo $res['c_id'];?>" class="text-white"> Delete</a></button></td>
<td><button class="btn-primary btn" name='update'><a href="course.php?update=<?php echo $res['c_id'];?>"class="text-white">Update</a></button></td>

</tr>
<?php
}
?>


    </tbody>
  </table>
  </div>
</div>

  <div class= "col-lg-6 m-auto">
  <form action="#" method="POST">
    <div class="card">
      <br>
      <div class="card-header bg-dark">
  
        <h2 class="text-white text-center">Insert Course records</h2>   
      </div>
      <div class="card-header text-dark bg-info">
      <div>
<br>
 <label for="dept_id">Course ID : </label>
  <input type="text" name="c_id" class="form-control"  placeholder="Enter Course ID" required=""  value="<?php echo $id; ?>">
  <br>
  <label for="fname">Course Name : </label>
  <input type="text" name= "c_name" class="form-control"  placeholder="Course" required=""  value="<?php echo $name;?>">
 
</div>
<br>
<div class="input_group">
					<input type="text" name="fee" class="form-control" placeholder="Course Fee" required=""   value="<?php echo $fee;?>">
				</div><br>
<div class="input_group">
					<input type="text" name="duration" class="form-control"  placeholder="Course Duration" required=""  value="<?php echo  $time;?>">	
</div><br>

<div class="input_group">
					<input type="text" name="elig" class="form-control"  placeholder="Eligibility" required=""  value="<?php echo $eligible; ?>">	
</div><br>

<div class="input_group">
					<input type="text" name="img" class="form-control"  placeholder="Image Path" required="" value="<?php echo $img;?>">	
</div><br>
<div class="input_group">
<input type="text" name="remark" class="form-control" placeholder="Remarks"  required=""  value="<?php echo  $remark?>">
				</div><br> 
        <div class="input_group">
<?php
if($edit_state == false){
?>
<button type="submit" name="course_insert" class="btn btn-primary btn-large">Save</button>
<?php
}
else{
  ?>
<button type="submit" name="course_update" class="btn btn-primary btn-large">Update</button>
<?php
}
  ?>
  	</div>

				
      

</div>
</div>
</form>
</div>


<?php
  ?>




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