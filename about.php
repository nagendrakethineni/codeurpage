<!DOCTYPE html>
<html lang="en">
<title>Get your website today!!</title>
<head>
<?php include_once('head.php');?>
</head>
<body>
<?php include_once('style.php');?>
<?php include_once('nav.php');?>
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
<!--<div class="container-fluid text-center">
<div class="row">
               <div class="col-sm-12 py-4 my-4">
                    <h2>OOPS..really sorry!</h2>
                    <p>Page Under Construction</p>
                    <a href="//collegelistings.in">go back</a>
               </div>
            </div>
</div> -->

<div class="container-fluid " style="background-color: #ffecdc ">
  <div class="row">
<div class="col-md-6">
<h1 class=" text-wrap" style="margin-top: 32%; font-size: 314%;margin-left: 7%"> Creating Engaging <br/>Content </h1>
<a href="contact.php"><button type="button" class="btn btn-primary btn-sm" style="margin-left: 52%; margin-top:13%"> Contact Us</button></a>  
</div>
<div class="col-md-6">
<img class="img-fluid" src="images/vm-abt.svg" style="width: 100%; margin-left: 4%"/>
</div></div></div>
<div class="container-fluid text-center "style="padding: 5%">

  <h1> About</h1>
  <p class="text-wrap">codeurpage is a value-driven IT services consultant. codeurpage was started in 2018. Dedicated team serving clients across India. Since its inception and throughout its journey, codeurpage keeps a philosophy of satisfying & valuing the customer.

Our Vision is to become the Consumer's trusted Company for broad range of IT applications solutions and services. codeurpage provides Enterprise Resource Planning (ERP), Customer relationship Management (CRM), Web Application Development, Mobile Application Development. Our Core Values are Accessibility, Accountability, Collaboration, Integrity, and Quality.
</p>
</div>
<div class="container-fluid text-center " style="padding:5%" >
 
<h1> Why ?</h1>
<p>
  We customize our technology solutions to meet an organization's / Individual's unique business needs. We listen to what our clients want and we also hear what they actually need. As the Internet continues to serve as the world's largest marketplace, we aim to be streets ahead of the curve and offer our clients best-in-class solutions from start to end.
</p>
</div>
<?php include_once('footer.php');?>
</body>
</html>
