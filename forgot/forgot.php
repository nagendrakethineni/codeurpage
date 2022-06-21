<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
$email=$_POST['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
require('/var/www/html/db.php');
// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlemail = "select email from signup where email = '".$email."'";
$resultemail=mysqli_query($conn,$sqlemail);
$countemail=mysqli_num_rows($resultemail);
if($countemail==0){
    echo "You are not registered withus Please ";
    echo "<a href='https://www.netgigs.pro/signup/'>Signup</a>";
}else{
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$code = generateRandomString();
$sqlcode = "UPDATE signup SET code = '$code' where email = '$email'";
$resultcode=mysqli_query($conn,$sqlcode);
$email_subject = "Reset Password";

  $email_body = "To reset your password follow the link https://www.netgigs.pro/forgot/resetpass.html?email=$email&code=$code";
  $to = "$email";

  $headers = "From: donotreply@netgigs.pro \r\n";

  mail($to,$email_subject,$email_body,$headers);
echo "Mail sent to $email";
}
$conn->close();
}
?>
