<?php
$email=$_POST['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
$userpassword=sha1($_POST['password']);
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
$sqlemail = "select * from signup where email = '".$email."' ";
$resultemail=mysqli_query($conn,$sqlemail);
$countemail=mysqli_num_rows($resultemail);
if($countemail == 0){
    echo "You are not registered with us. Please signup";
}
else {
$sql = "select email,password from signup where email = '".$email."' and password = '".$userpassword."'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==0){
    echo "Please check your password";   
}
else{
    echo "Success";
    session_start();
    $_SESSION["email"] = $email;
    //$_SESSION["password"] = $userpassword;
}
}
}
?>