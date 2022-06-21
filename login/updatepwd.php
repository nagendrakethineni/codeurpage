<?php
session_start();
$opwd = sha1($_POST['opwd']);
$cpwd = sha1($_POST['cpwd']);
$email = $_SESSION['email'];
require('db.php');

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "select * from signup where email='$email'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
if($row1['password']==$opwd){
    $sql2 = "update signup set password='$cpwd' where email='$email'";
    $result2 = mysqli_query($conn,$sql2);
    echo "Password updated successfully...";
}
else{
    echo "Old password is wrong";
}
?>