<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: login1.html");
}
else{
require('db.php');
$dbname = "test";
$typereq = $_POST['typereq'];
$purp = $_POST['purp'];
$nopg = $_POST['nopg'];
$purl = $_POST['purl'];
$description = $_POST['description'];
$mf = $_POST['mf'];
$logoup = $_POST['logoup'];
$logo = logofile;
$files = imagespath;
// Create connection
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
$sqlreq = "SELECT max(reqid) from web_dev";
$resultreq = mysqli_query($conn,$sqlreq);
$rowreq = mysqli_fetch_array($resultreq);
$wd = 'WD'; 
$req = $rowreq[0]+1 ;   
$req = $wd.$req;    
$sql = "insert into web_dev(typereq,purp,nopg,purl,description,mf,logoup,logo,files,email,status,product,reqid1,plan) values('$typereq','$purp','$nopg','$purl','$description','$mf','$logoup','$logo','$files','$email','NEW','Web Development','$req','$plan[0]');";
if ($conn->query($sql) === TRUE) {
	echo "Inserted successfully"
;}
mysqli_close($conn);
}
?>