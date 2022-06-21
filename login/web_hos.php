<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
$domainreq = $_POST['domainreq'];
$avbdom = $_POST['avbdom'];
$purven = $_POST['purven'];
$val = $_POST['val'];
$oth = $_POST['oth'];
$dpur = $_POST['dpur'];
$prdom = $_POST['prdom'];
$prsdom =$_POST['prsdom'];
require('db.php');
$dbname = "test";
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlplan = "select * from signup where email='$email'";
$resultplan = mysqli_query($conn,$sqlplan);
$rowplan = mysqli_fetch_array($resultplan); 
$plan = explode("+",$rowplan['admin']);
$sqlreq = "SELECT max(reqid) from web_hos";
$resultreq = mysqli_query($conn,$sqlreq);
$rowreq = mysqli_fetch_array($resultreq);
$wh = 'WH'; 
$req = $rowreq[0]+1 ;   
$req = $wh.$req;    
$sql = "insert into web_hos(domainreq,avbdom,purven,val,oth,dpur,prdom,prsdom,email,status,product,reqid1,plan) values('$domainreq','$avbdom','$purven','$val','$oth','$dpur','$prdom','$prsdom','$email','NEW','Web Hosting','$req','$plan[2]') ";
if ($conn->query($sql) === TRUE) {
	echo "Inserted successfully";
}
else{echo "Error";}
mysqli_close($conn);
}
?>