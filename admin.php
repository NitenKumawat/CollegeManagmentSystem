<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panal</title>
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
        src="logo.png"
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
      <li class="nav-item active">
          <a class="nav-link waves-effect waves-light" href="admin.php"><i class="fas fa-home me-2"> </i>Home
            <span class="sr-only">(current)</span>
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="dept.php"><i class="fas fa-university me-2"></i>Department</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="course.php"><i class="fas fa-swatchbook me-2"></i>Courses</a>
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
    

<div>
  <center>
  <img src="img/welcome.jpg " alt="image" height="700px", width="1000px">
  </center>
 </div>
  

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
></script>
</body>
</html>