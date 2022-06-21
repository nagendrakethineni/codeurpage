<!DOCTYPE html>
<html lang="en">
<title>Get your website today!!</title>
<head> 
  <?php include_once('../head.php');?>  
  </head>
  <body>
  <?php include_once('../style.php');?>
  <?php include_once('../nav.php');?>

<script>
 $(document).ready(function(){
 function scrollbar(){
	var bdy = document.getElementById('body');
	var x = bdy.scrollLeft;
	var y = bdy.scrollTop;
	if(y>300){
		document.getElementById('scrolltotop').style.display = 'block';
	}
	else{
		document.getElementById('scrolltotop').style.display = 'none';
	}
} });
</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6" style="background-color: #cfddf65c">
      <img class="img-fluid" src="/images/vm-services.svg" style="margin-left: -1%;width: 90%"/></div>
      <div class="col-md-6" style="background-color: #cfddf65c">
      <h2 class="text-wrap"style="margin-left: 0.5%; margin-top: 25%">Digital Transformation = Ensuring success </h2>
    </div>
    
  </div>
</div>
<div class="container-fluid text-center bg-light" style="padding: 2%;">
<div class="row">
<div class="col-md-12">
<h3>Services</h3>
<p> Tap into the knowledge and experience of product implementation specialists, subject matter experts, data engineers and data scientists to capitalize on your online platform investment and deliver more value faster, at every stage of your data-driven journey.</p> 
<h5>The smartest way to success</h5>
<p>
SmartServices are focused offerings to support you through each stage of your Domain journey - from pilot to production. From out of the box offerings to customized packages, SmartServices are designed for you to realize the value of your Domain investment quickly, painlessly, at a lower cost and with peak performance.</p>
</div>
</div>
</br></br>
<div class="row">
<div class="col-md-4">
<h5> SmartStart: From pilot to production</h5>
<p> Architect a complete solution to fast track your data flow.</p>	
</div>
<div class="col-md-4">
<h5> SmartOffload: Migrate to workloads distributions</h5>
<p> Migrate your legacy data workloads  for unprecedented scale and performance</p>	
</div>
<div class="col-md-4">
<h5>SmartHealth: Ensure optimal performance</h5>
<p> Provide peak performance for your Domain.</p>	
</div>
</div>
</div>

<div class="container-fluid" style="padding: 2%;" >
  <div class="row">
    <div class="col-md-4">
      <div class="card">	
      <img class="card-img-top img-fluid" src="/images/smartstart.svg" style="width:40%;margin-left:29%;margin-top:4%;"/>
      </br>
      <h5 class="card-title text-center"> Smart Start </h5>
      <p class="card-body">
      	
Start your business Online Smartly with us with no hastles ahead, Just by creating your website of your choice. We design and develop you a mobile friendly website for your business.</p>
<h5 class="text-center"> Package Includes</h5>
<ul style="list-style-type:none; margin-left: 15%">
	<li><img src="/images/check-mark-18.svg"></img> Domain Registration</li>
	<li><img src="/images/check-mark-18.svg"></img> Domain Control </li>
	<li><img src="/images/check-mark-18.svg"></img> Website Design and Develop</li>
	<li><img src="/images/check-mark-18.svg"></img> Hosting with SSL</li>
</ul>
      
      <a href="/signup/index.php"><button type="button" class="btn btn-sm btn-primary" style="margin-left: 33%" >Choose Now !!</button></a>
      </br> 
      </div>
      
      
      </div>
   
    <div class="col-md-4">
    <div class="card">
    <img class="card-img-top img-fluid" src="/images/smartoffload.svg" style="width:40%;margin-left:29%;margin-top:4%;"/>
      </br>
      <h5 class="card-title text-center"> Smart Offload </h5>
      <p class="card-body"> Want to Manage your work smartly and backtrack it in case ! Then come choose "Smart Offload" where you can manage 
	  your day tasks and keep track of your client requirements, get the day synopsis in just one click using Smart Dashboards</p>
<h5 class="text-center"> Package Includes</h5>
<ul style="list-style-type:none; margin-left: 15%">
	<li><img src="/images/check-mark-18.svg"></img> C.R.M Design/Develop</li>
	<li><img src="/images/check-mark-18.svg"></img> Dash Boards </li>
	<li><img src="/images/check-mark-18.svg"></img> Client Management</li>
	<li><img src="/images/check-mark-18.svg"></img> LifeTime Support*</li>
</ul>
      
      <a href="/signup/index.php"><button type="button" class="btn btn-sm btn-primary" style="margin-left: 33%" >Choose Now !!</button></a>
      </br> 
    </div>
   </div>
   <div class="col-md-4">
    <div class="card">
    <img class="card-img-top img-fluid" src="/images/health.svg" style="width:40%;margin-left:29%;margin-top:4%;"/>
      </br>
      <h5 class="card-title text-center"> Smart Health </h5>
      <p class="card-body"> Got a site or an Application - Monitioring is a hastle ! Let us Monitor it's Performance and recomend you the changes required 
	  and also let us check the "Logs" of your application to help you avaoid upcoming incidents and give high Availablity.  </p>
<h5 class="text-center"> Package Includes</h5>
<ul style="list-style-type:none; margin-left: 15%">
	<li><img src="/images/check-mark-18.svg"></img> Performance Monitoring </li>
	<li><img src="/images/check-mark-18.svg"></img> Log Analysing </li>
	<li><img src="/images/check-mark-18.svg"></img> High Availability</li>
	
</ul>
      
      <a href="/signup/index.php"><button type="button" class="btn btn-sm btn-primary" style="margin-left: 33%" >Choose Now !!</button></a>
      </br> 
      </div>
   </div>
  </div>
</div><!--
<div class="container-fluid text-center">
<div class="row">
               <div class="col-sm-12 py-4 my-4">
                    <h2> sorry! </h2>
                    <p>Page Under Construction</p>
                    <a href="//codeurpage.co.in">go back</a>
               </div>
</div>
</div> -->
<?php include_once('../footer.php');?>
</body>
</html>
