<?php
session_start();
error_reporting(0);
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
require('db.php'); 
$msg = $_POST['msg'];
$id = $_POST['id']; 
$pending = $_POST['pending'];    
$time=time();
$time=date("M-d g:i A",$time);
// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlname = "select * from signup where email='$email'";
$resultname = mysqli_query($conn,$sqlname);
$rowname = mysqli_fetch_array($resultname);
$name = $rowname['name']; 
$sql = "select * from msg where id='$id'";
$result = mysqli_query($conn,$sql);   
$count = mysqli_num_rows($result);
if(!ISSET($pending)){ if($rowname['admin']=='ADMIN'){$pending='User';}  else{$pending='Admin';}  }
if($id[1]=='G'){$sql2 = "update cg set updted = '$time',updatedby='$name',pending='$pending' where reqid1='$id'";}    
if($id[1]=='T'){$sql2 = "update ot set updted = '$time',updatedby='$name',pending='$pending' where reqid1='$id'";}    
if($id[1]=='H'){$sql2 = "update web_hos set updted = '$time',updatedby='$name',pending='$pending' where reqid1='$id'";}    
if($id[1]=='D'){$sql2 = "update web_dev set updted = '$time',updatedby='$name',pending='$pending' where reqid1='$id'";}    
if($count == 0){
    $sql1 = "insert into msg (msg,time,lastupdate,id) values ('^$msg`$name|$time','$time','$name','$id')";
}else{
    $sql1 = "update msg set msg = concat(msg,'^$msg`$name|$time'),time='$time',lastupdate='$name' where id='$id'";
}
    $result2 = mysqli_query($conn,$sql2);
    $result1 = mysqli_query($conn,$sql1);
    echo "Message sent";
}
?>