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
$purp = $_POST['purp'];
$tagline = $_POST['tagline'];
$description = $_POST['description'];
$fi = $_POST['fi'];
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
$sqlreq = "SELECT max(reqid) from l_des";
$resultreq = mysqli_query($conn,$sqlreq);
$rowreq = mysqli_fetch_array($resultreq);
$ld = 'LD'; 
$req = $rowreq[0]+1 ;   
$req = $ld.$req;    
$sql = "insert into l_des(purp,description,tagline,favicon,email,status,product,reqid1,plan) values('$purp','$description','$tagline','$fi','$email','NEW','Logo Design','$req','$plan[4]');";

if ($conn->query($sql) === TRUE) {
	echo "Inserted successfully"
;}
mysqli_close($conn);
}
?>