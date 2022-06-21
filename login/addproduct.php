<?php
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
require('db.php');
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$wdcb = $_POST['wdcb'];
$wdescb = $_POST['wdescb'];
$whcb = $_POST['whcb'];
$ldcb = $_POST['ldcb'];
$adcb = $_POST['adcb'];
$cgcb = $_POST['cgcb'];
$otcb = $_POST['otcb'];
$wdpl = $_POST['wdpl'];
$wdespl = $_POST['wdespl'];
$whpl = $_POST['whpl'];
$ldpl = $_POST['ldpl'];
$adpl = $_POST['adpl'];
$cgpl = $_POST['cgpl'];
$otpl = $_POST['otpl'];

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "update signup set product='$wdcb+$wdescb+$whcb+$adcb+$ldcb+$cgcb+$otcb',admin='$wdpl+$wdespl+$whpl+$adpl+$ldpl+$cgpl+$otpl' where email='$email';";
$sql1 = "update web_dev set plan='$wdpl' where email='$email'";
$result1 = mysqli_query($conn,$sql1);
$sql2 = "update web_des set plan='$wdespl' where email='$email'";
$result2 = mysqli_query($conn,$sql2);
$sql3= "update web_hos set plan='$whpl' where email='$email'";
$result3 = mysqli_query($conn,$sql3);
$sql4 = "update app_des set plan='$adpl' where email='$email'";
$result4 = mysqli_query($conn,$sql4);
$sql5 = "update l_dev set plan='$ldpl' where email='$email'";
$result5 = mysqli_query($conn,$sql5);
$sql6 = "update cg set plan='$cgpl' where email='$email'";
$result6 = mysqli_query($conn,$sql6);
$sql7 = "update ot set plan='$otpl' where email='$email'";
$result7 = mysqli_query($conn,$sql7);

if ($conn->query($sql) === TRUE) {
	echo "Products added successfully"
;}
mysqli_close($conn);
}
?>
