<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
require('db.php');
$dbname = "test";
$course = $_POST['course'];
$coursetype = $_POST['coursetype'];
$prefbatch = $_POST['prefbatch'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$goal = $_POST['goal'];
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
$sqlreq = "SELECT max(reqid) from ot";
$resultreq = mysqli_query($conn,$sqlreq);
$rowreq = mysqli_fetch_array($resultreq);
$ot = 'OT'; 
$req = $rowreq[0]+1 ;   
$req = $ot.$req;    
$sql = "insert into ot(course,coursetype,prefbatch,startdate,enddate,goal,email,status,product,reqid1,plan) values('$course','$coursetype','$prefbatch','$startdate','$enddate','$goal','$email','NEW','Online Training','$req','$plan[6]');";
if ($conn->query($sql) === TRUE) {
	echo "Inserted successfully";
}
else{
	echo "Error";
}
mysqli_close($conn);
}
?>