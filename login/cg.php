<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
//       header("location: index.html");
}
else{
$rtarget_file = basename($_FILES["filename"]["name"]);
$rfile_name = $_FILES["filename"]["name"];
$rfile_size = $_FILES["filename"]["size"];
$rfile_ext = strtolower(end(explode('.',$_FILES["filename"]["name"])));
$rexp = array("pdf");
$rerrors = array();
require('db.php');
$dbname = "test";
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$t = time();
$time = (date("d-M-Y | H:i",$t)); 
$sqln = "select * from signup where email='$email' ";
$resultn = mysqli_query($conn,$sqln);
$rown = mysqli_fetch_array($resultn); 
$name = $rown['name'];    
if($rfile_size==0){
echo "Please choose file";	
}	
elseif(in_array($rfile_ext,$rexp)=== false){
echo "Please choose PDF";
}
elseif($rfile_size > 5024000){
echo "File size should be less than 5MB";
}
else{
move_uploaded_file($_FILES["filename"]["tmp_name"],"userresume/".$rtarget_file);
$sqlplan = "select * from signup where email='$email'";
$resultplan = mysqli_query($conn,$sqlplan);
$rowplan = mysqli_fetch_array($resultplan); 
$plan = explode("+",$rowplan['admin']);
$sqlreq = "SELECT max(reqid) from cg";
$resultreq = mysqli_query($conn,$sqlreq);
$rowreq = mysqli_fetch_array($resultreq);
$cg = 'CG'; 
$req = $rowreq[0]+1 ;   
$req = $cg.$req;    
$sqlr = "INSERT INTO cg (email,resume,status,product,reqid1,plan,updted,updatedby) values ('$email','$rfile_name','NEW','Career Guidance','$req','$plan[5]','$time','$name')";
$resultr = mysqli_query($conn,$sqlr);
echo "Resume uploaded Successfully";
}
}
?>
