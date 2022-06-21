<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_POST['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
  $name=$_POST['name'];
  $userpassword=sha1($_POST['password']);
  $address=$_POST['address'];
  $role=$_POST['role'];
  $product=$_POST['products'];
  if($product=='Smart Start'){
    $product = 'Web Development++Web Hosting+++++';
  }
  if($product=='Smart OFFload'){
    $product = '++Web Hosting+App Development++++';
  }
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
$sql = "INSERT INTO signup(name,email,password,address,date,time,code,admin,filename,dob,gender,resumename,suspend,product)
VALUES ('$name','$email','$userpassword','$address',CURDATE(), CURTIME(),'','$role','default.png',CURDATE(),'male',NULL,'Active','$product')";

if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
       // $email_subject = "Netgigs Signup ";

       // $email_body = "Thank You for Signing up with us $name.\nYour Email: $email \n Your Address : $address";
  //$to = "anybody@netgigs.pro,$email";

  //$headers = "From: anybody@netgigs.pro \r\n";

  //$headers .= "Reply-To: anybody@netgigs.pro \r\n";

  //mail($to,$email_subject,$email_body,$headers);
//  echo "<html><head><title>Signup</title><script type='text/javascript' src='/mine/js/jquery-2.1.4.min.js'></script></head><body><script type='text/javascript'>";
  echo "Account created successfully. Please Signin into your account";
//  echo "location='https://ajith.netgigs.pro/mine/login/';";
//  echo "</script></body></html>";
//  header("Location:https://ajith.netgigs.pro/mine/login/ ");
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "You are already having account Please Signin ";
//    echo "<a href='https://ajith.netgigs.pro/mine/login/'>Please Login</a>";
   }

$conn->close();
} 
?>
