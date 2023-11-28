<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home panal</title>
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


<!-- Navbar -->
<nav class="navbar navbar-expand-lg  bg-color-">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
   
   

    
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
     
     
        <ul class="nav nav-tabs mb-5 me-auto mb-2 mb-lg-0"  id="ex-with-icons" role="tablist">
        
<a class="navbar-brand me-2 " >
      <img
        src="img/logo.png"
        height="50"
        alt="CMS"
        loading="lazy"
        style="margin-left: 10px;"
      />
    </a>
  <li class="nav-item" role="presentation"  style="margin-top: 4px;">
    <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-home me-2"> </i>Home</a>
  </li>
  <li class="nav-item" role="presentation"  style="margin-top: 4px;">
    <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-university me-2"></i>Department</a>
  </li>
  <li class="nav-item" role="presentation"  style="margin-top: 4px;">
    <a class="nav-link" id="ex-with-icons-tab-3" data-mdb-toggle="tab" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-swatchbook me-2"></i>course</a>
  </li>
  <li class="nav-item" role="presentation"  style="margin-top: 4px;">
    <a class="nav-link" id="ex-with-icons-tab-4" data-mdb-toggle="tab" href="#ex-with-icons-tabs-4" role="tab"
      aria-controls="ex-with-icons-tabs-4" aria-selected="false"><i class="fab fa-angular me-2"></i>About us</a>
  </li>
  
      </ul>
<div>
  <a href="login.php">
  <button type="button" class="btn btn-link px-3 me-2">
<i class="fas fa-sign-in-alt me-2"></i>Login
        </button>
  </a>

</div>

    
      <!-- Left links -->

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



<!-- Tabs content -->
<div class="tab-content" id="ex-with-icons-content" >
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <!-- Tab 1 content -->

    <section>
    <?php if (isset($_POST['submitted'])):
$name=$_POST['name'];
$email=$_POST['email'];
$mobail=$_POST['mobail'];
$query=$_POST['message'];

include 'connection.php';

// $sql= "INSERT INTO `inquiry`(`id`, `name`, `email`, `mobile_no`, `query`) VALUES ([],[$name],[$email],[$mobail],[$query])";
$sql = "INSERT INTO inquiry(name,email,mobile_no,query) values('$name', '$email',$mobail,'$query')";
if(mysqli_query($conn,$sql))
{
  ?>
  <script> alert ('your form submitted'); </script>
  <?php
}

else{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn)  ;
?>



<?php endif; 
 ?>



<div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
    <div class="container-fluid my-2">
      <div class="row">
        <div class="col-lg-6 my-auto">
          <h1 class="display-5 font-weight-bold ">Government Engineering College<br>Ajmer</h1>
          <p class="py-lg-4"> Email : principal@ecajmer.ac.in <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;principal.eca@rajasthan.gov.in<br>
					Phone : +911452971024 <br>
					GST No: 08AABAP0959P1ZZ<br>
					NBA Accredited B.Tech. -CE,ECE,EE,EIC,MECH <br>
				</p>
         
        </div>
        <div class="col-lg-6">
          <div class="col-lg-8 mx-auto card shadow-lg">
            <div class="card-body py-5">
              <h3>Inquiry Form</h3>
              <form action="home.php" method="POST" >
                <!-- Material input -->
               
                <div class="md-form">
                <label >Your Name</label>
                  <input type="name" name="name" class="form-control" required="">
                  
                </div>
                <!-- Material input -->
                <div class="md-form">
                <label>Your Email</label>
                  <input type="email" name="email" class="form-control" required="">
                 
                </div>
                <!-- Material input -->
                <div class="md-form">
                <label >Your Mobile</label>
                  <input type="mobile" name="mobail" class="form-control" required="">
                  
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <!-- <input type="text" id="class" class="form-control"> -->
                  <label >Your Query</label>
                  <textarea type="text" name="message" class="form-control md-textarea" rows="3" required=""></textarea>
                  
                </div>
                <br>
<input type="hidden" name= "submitted" value = '1' />
                <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value= 'Submit Form' />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</section>

<section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5 ">
          <h2 class="font-weight-bold">About <br>GECA,AJMER</h2>
          <div class="pr-5">
        <p>Engineering College, Ajmer, generally referred to as ECA, (formerly known as Govt. Engineering College or GECA) is a public state technical college located in Ajmer, Rajasthan, India. It was established in 1997.<br><br>The Engineering College, Ajmer, is located at Badaliya Chouraha, near N.H.8, Ajmer, thus make it completely isolated from the main city. The campus is built on almost 300 acres of land and is surrounded by many hills. The Jain temple, the Nareli temple, stands nearby. A six-lane road connecting Jaipur and Jodhpur passes just opposite to the college.   </P>
        </div>
        <a href="https://en.wikipedia.org/wiki/Government_Engineering_College,_Ajmer" class="btn btn-secondary waves-effect waves-light" >Know More</a>
        </div>
        <div class="col-lg-6" style="background:url(img/GECA.png)">
        </div>
      </div>
    </div>
  </section>

  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
    <!-- Tab 2 content -->

    <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5 ">
          <h2 class="font-weight-bold">About <br>Departments</h2>
          <div class="pr-5">
            <p>
            ECA has ten departments, each led by a Head of Department. Each department offers a program at undergraduate and postgraduate level. 
            </P>
               </div>
          <a href="https://en.wikipedia.org/wiki/Government_Engineering_College,_Ajmer#Department" class="btn btn-secondary waves-effect waves-light" >Know More</a>
        </div>
        <div class="col-lg-6" style="background:url(img/dlogo.jpg)" >
        </div>
      </div>
    </div>
  </section>

<!-- department data  -->
<section>
<div class="container py-5">
<h1 class="text-center"> Our Departments</h1>

<div class="row mt-4">
<?php
include  'connection.php';
$sq="SELECT * FROM department";
$qrun=mysqli_query($conn,$sq);
$check_dept=mysqli_num_rows($qrun) > 0;

if($check_dept){
while($row = mysqli_fetch_array($qrun))
{
  ?>
  <div class="col-md-4">
 <div class="card mt-4" >
 
 <img src="<?php echo $row['dept_img_path'] ?>"  onerror="this.src='img/dept.jpg'" class="card-img-top" width="300px" height="200px">

 <div class="card-body">
  
  <h5 class ="card-text"> <?php echo 'Department ID :-'. $row['dept_id']?> </h5>
               <h5 class ="card-text"> <?php echo 'Department Name :-'. $row['dept_name']?> </h5>
               <h5 class ="card-text"> <?php echo 'Head of department :-'. $row['hod']?> </h5>
               <h5 class ="card-text"> <?php echo 'Location :-'. $row['location']?> </h5>
               
<button class="btn btn-success" >Check Now </button>
</div>
</div>

  </div>
  <?php
}

}

else{
  echo 'No department found';
}
?>
</div>
</div>


</section>



</div>

<div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
    <!-- Tab 3 content -->
    
<section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5 ">
          <h3 class="font-weight-bold">About <br>Courses</h3>
          <div class="pr-5">
          <p>
     To nurture value oriented competent professionals through conceptual, analytical and technical knowledge for overall sustainable societal development.
<br>To achieve academic excellence in engineering, technology and science by imparting quality based education.<br>
To strengthen managerial and entrepreneurial skills to start new ventures.<br>
To inculcate inquisitive and research oriented approach.
     </p></div>
          <a href="https://www.shiksha.com/college/engineering-college-ajmer-25156/courses" class="btn btn-secondary waves-effect waves-light">Know More</a>
        </div>
        <div class="col-lg-6" style="background:url(img/clogo.jpg)">
        </div>
      </div>
    </div>
  </section>


 <!-- course data  -->
<section>
<div class="container py-5">
<h1 class="text-center"> Our Courses</h1>

<div class="row mt-4">
<?php
include  'connection.php';
$sq="SELECT * FROM course";
$qrun=mysqli_query($conn,$sq);
$check_dept=mysqli_num_rows($qrun) > 0;

if($check_dept){
while($row = mysqli_fetch_array($qrun))
{
  ?>
  <div class="col-md-4">
 <div class="card mt-4" >

 <img src="<?php echo $row['c_img_path'] ?>" onerror="this.src='img/course.jpg'" alt="no image" class="card-img-top" width="300px" height="150px">

 <div class="card-body">
  
  <h5 class ="card-text"> <?php echo 'Course ID :-'. $row['c_id']?> </h5>
               <h5 class ="card-text"> <?php echo 'Course :-'. $row['c_name']?> </h5>
               <h5 class ="card-text"> <?php echo 'Eligibility :-'. $row['eligibility']?> </h5>
               <h5 class ="card-text"> <?php echo 'Duration :-'. $row['duration']?> </h5>
               <h5 class ="card-text"> <?php echo 'Price :-'. $row['fee']?> </h5>
               <h6 class ="card-text"> <?php echo $row['Remark']?> </h6>
               
<button class="btn btn-success" >Enroll Now </button>
</div>
</div>

  </div>
  <?php
}

}

else{
  echo 'No Course found';
}
?>
</div>
</div>


</section>



</div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
    <!-- Tab 3 content -->
    
<div class="container" style="margin-top=100px;">
   
   <!-- start course content -->
       <div class="col-lg-12 col-md-12 col-sm-12">

       <br><br>
           <div class="row ">

          
               <!-- start single course -->
               
               <h2>History </h2>
               <p>Established in the year 1997, Engineering College Ajmer, generally referred to as ECA is an autonomous institute of the Government of Rajasthan. Its foundation stone was laid by the former technical education minister honorable Shri Kalicharanji Saraf at Badaliya, Ajmer. A perfect amalgamation of innovation, inspiration and synergy Engineering College Ajmer aims to be a model institution for students across disciplines and programmes. Since its inception it has been promoting and encouraging research based experiential learning among all the students. It is one of the leading technical institutes in Rajasthan known for quality education, state of the art infrastructure, modern and well equipped laboratories, a well established digital library having  RFID system, and above all  an institute with maximum number of placements. The institute has the honour of having maximum placements among all the Government Colleges of Rajasthan.</p>
<br>
               <h2>Campus</h2>
               <p>Engineering College Ajmer, situated in the lap of Aravalli mountain ranges has a lush green campus spreading in around 300 acres of land, away from the hustle and bustle of the city, in a calm and serene environment adorned in its vicinity by the world famous Nareli Jain temples. The institute is located on NH 8 which connects Jaipur and Jodhpur. </p>
<p>The campus is well constructed with several blocks which include the Civil and Electrical block, Central Library, Main building which houses the administrative block , Department of Computer Science and Information Technology  and the Department of Masters in Computer Application. The new building has the Department of Applied Sciences and Humanities, Department of Electronics and Communication Engineering, Department of Mechanical Engineering and Department of Management Studies.  Advancing forward towards the rear side is located the Guest house, Girls Hostel and Mechanical Workshop.</p>
<p>The campus is a green, ecofriendly and hitech campus with Wifi facility throughout the premises. Carbon footprints are controlled using Solar Power Plant of 210 kW capacity which has been installed under RESCO mode by AZURE Rooftop One Pvt.Ltd and is functional since 2018. The plant generates on an average 840 kWh per day (306 MWh per year) and mitigates approximately 254 tonnes of carbondioxide annually (assuming emission factor of 0.83-CO2 per kWh). 
For the all round development of the student there are playgrounds and facility for indoor games is also available. 
               </p>
                   <!-- End single course -->
           </div>
       </div>
         <!-- End course content -->

         <div class="container" style="margin: top 15px;px;min-height:390px;">
  
  <!-- start course content -->
      <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row ">
              <!-- start single course -->
              <br>

              <h2>Vision</h2>
              To foster harmonious value oriented environment for all in an efficient innovative manner to contribute nation through excellence in academics and research.
              <h2>Mission </h2>
              
<ul style="list-style-type:disc">
<li>To nurture value oriented competent professionals through conceptual, analytical and technical knowledge for overall sustainable societal development.</li>
<li>To achieve academic excellence in engineering, technology and science by imparting quality based education.</li>
<li>To strengthen managerial and entrepreneurial skills to start new ventures.</li>
<li>To inculcate inquisitive and research oriented approach.</li>
</ul> 

                  <!-- End single course -->
          </div>
      </div>
        <!-- End course content -->

</div>


<div class="container" style="margin-top:5px;min-height:390px;">
  
  <!-- start course content -->
      <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row ">
              <!-- start single course -->
<h2>PEOs</h2>
<ol type="1">
<li>To focus on conceptual knowledge and creativity in engineering to innovate, design and development for global competition. <br>
वैश्विक प्रतिस्पर्धा के लिए अभियांत्रिकी में रचनात्मकता नवाचार, डिजाइन और विकास के लिए मूल सिद्धांतों पर बल.</li>
<li>
To inculcate the practice of team work to achieve project objectives using modern technical methods. <br>
सामूहिक समर्पणभाव की स्थापना द्वारा परियोजना उद्देश्य पूर्ति हेतु आधुनिक तकनीकी पद्धतियों का उपयोग.
</li>
<li>To communicate effectively, demonstrate leadership skills and exhibit professional conduct for employment and entrepreneurship in competitive environment. <br>
प्रभावी संवाद, प्रतिस्पर्धी वातावरण में व्यावसायिक नैतिकता, नेतृत्व कौशल व उद्यमशीलता प्रदर्शित करना.</li>
<li>To involve in lifelong self-learning, research enhancement and adapt to work for multidisciplinary professional and social needs.<br>
बहुआयामी व्यावसायिक व सामाजिक आवश्यकतानुसार अनुसंधान वृत्ति व आजीवन आत्म-शिक्षण.</li>
</ol> 
                  <!-- End single course -->
          </div>
      </div>
        <!-- End course content -->

</div>

         <!-- start course archive sidebar -->
       <div class="col-lg-3 col-md-3 col-sm-12">
               <div class="single_sidebar">
               <h2 style="">Quick Links <span class="fa fa-angle-double-right"></span></h2>
               <ul>
                   <li>
                       <a style="font-size:18px;color:red" href="https://en.wikipedia.org/wiki/Government_Engineering_College,_Ajmer">Wikipedia Article</a>
                   </li>
               </ul>
               </div>
       </div>
</div>  
</div>

</div>
<!-- Tabs content -->    




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
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script>
</body>
</html>