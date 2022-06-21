<?php 
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
//$userpassword=$_SESSION['password'];
require('db.php'); 
$status = $_POST['status'];
$product = $_POST['product'];  
$uemail = $_POST['email'];    
// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "DB Connection Error";
}
if($product == 'Career Guidance'){    
$sql = "update cg set STATUS='$status' where email='$uemail'";  
}
if($product == 'Online Training'){    
$sql = "update ot set STATUS='$status' where email='$uemail'";
}
if($product == 'Web Development'){    
$sql = "update web_dev set STATUS='$status' where email='$uemail'";
}
if($product == 'Web Hosting'){    
$sql = "update web_hos set STATUS='$status' where email='$uemail'";
}
if($product == 'Web Design'){    
$sql = "update web_des set STATUS='$status' where email='$uemail'";
}
$result = mysqli_query($conn,$sql);  
echo "Status Changed";  
}
?>