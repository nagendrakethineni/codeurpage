<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_POST['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
$target_file = basename($_FILES["dp"]["name"]);
$file_name = $_FILES["dp"]["name"];
$file_size = $_FILES["dp"]["size"];
$file_ext = strtolower(end(explode('.',$_FILES["dp"]["name"])));
$file_ext1 = explode('.',$_FILES["dp"]["name"]);
$file_ext = strtolower($file_ext1[1]);
$exp = array("jpeg","jpg","png");
$errors = array();
//$rtarget_file = basename($_FILES["resume"]["name"]);
//$rfile_name = $_FILES["resume"]["name"];
//$rfile_size = $_FILES["resume"]["size"];
//$rfile_ext = strtolower(end(explode('.',$_FILES["resume"]["name"])));
//$rexp = array("pdf");
//$rerrors = array();
//$userpassword=$_POST['password'];
$name=$_POST['name'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
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

if($_FILES["dp"]["size"] == 0 ){
$sql = "UPDATE signup SET name='$name',address='$address',dob='$dob',gender='$gender' where email='$email'";
if ($conn->query($sql) === TRUE) {
    echo "Profile Updated Successfully. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
elseif(in_array($file_ext,$exp)=== false){
echo "Please choose Jpg or Jpeg or Png";
}
elseif($file_size > 102400){
echo "File size should be less than 1MB";
}
else{
move_uploaded_file($_FILES["dp"]["tmp_name"],"userdp/".$target_file);
$sqlimg = "UPDATE signup SET name='$name',address='$address',dob='$dob',gender='$gender',filename='$file_name' where email='$email'";
$resultimg = mysqli_query($conn,$sqlimg);
echo "Profile Updated Successfully.";
}
}
mysqli_close($conn);
?>
