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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid" src="images/vm-contact.svg" style="margin-left: -3%;width: 144%"/>
    </div>
    <!--<div class="col-md-6">
     <a href="#" ><i class="fa fa-facebook" aria-hidden="false" style="margin-top: 2%; margin-left: 29%; width: 12%"></i></a>
     <a href="https://wa.me/91800453490" ><i class="fa fa-whatsapp" aria-hidden="true" style="margin-top: 4%; margin-left: 7%; width: 12%"></i></a>
     <a href="https://g.page/codeurpage?share" ><i class="fa fa-google" aria-hidden="true" style="margin-top: 6%; margin-left: 6%; width: 12%"></i></a>
    </div>-->
  </div>
</div>
<div class="container" >
  <div class="row text-center">
    <div class="col-md-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.1556313789506!2d81.00027901434088!3d16.416920434387954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a361ddc4fa4f1c7%3A0x65e4d47cf5ca2b23!2scodeurpage!5e0!3m2!1sen!2sin!4v1582370227964!5m2!1sen!2sin" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <div class="col-md-6" style="padding: 2%">
    <h5> codeurpage IT Services </h5>
    <p>RTC Colony,</p>
    <p>Gudivada,</p>
    <p>Andhra Pradesh</p>
    <p>Pin: 521301</p>
    <p><i class="fa fa-mobile" aria-hidden="true"></i>+91 8008453490</p>
    <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@codeurpage.co.in">info@codeurpage.co.in</a></p>
   </div>
  </div>
</div>
<!--<div class="container-fluid text-center">
  

<div class="row">
               <div class="col-sm-12 py-4 my-4">
                    <h2>OOPS..really sorry!</h2>
                    <p>Page Under Construction</p>
                    <a href="//codeurpage.co.in">go back</a>
               </div>
            </div>


</div>
-->
<?php include_once('footer.php');?>	
</body>
</html>
