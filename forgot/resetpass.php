<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
$email=$_COOKIE['emailvalue'];
if($email==NULL)
{
        header("location: index.html");
}
else{
$code=$_COOKIE['emailcode'];
$pwd=sha1($_POST['password']);
require('/var/www/html/db.php');

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select email,code from signup where email = '".$email."' and code = '".$code."'";
//$sqlcode = "select code from signup where email='$email'";
$result=mysqli_query($conn,$sql);
//$resultcode=mysqli_query($conn,$sqlcode);
$count=mysqli_num_rows($result);
//$countcode=mysqli_num_rows($resultcode);
if($count==0){
    echo "Your Link expired please use forgot password again ";
}
elseif($count==1){
$sqlpwd = "UPDATE signup SET password='$pwd' where email='$email'";
$sqlcodeup = "UPDATE signup SET code=' ' where email='$email'";
$resultcodeup=mysqli_query($conn,$sqlcodeup);
if ($conn->query($sqlpwd) === TRUE) {
    echo "Password Changed Successfully ";
//    echo "<a href='https://ajith.netgigs.pro/mine/login'>Login</a>";
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
