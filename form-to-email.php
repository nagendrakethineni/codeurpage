<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
 

	$email_subject = "Thanks for Your message ";

	$email_body = "Thank You for showing interest. Soon i will contact you regarding the same. Please co-operate with us to serve you better $name.\nYour Email: $email \nYour Message:$message";     
  $to = "info@netgigs.pro,$email";

  $headers = "From: info@netgigs.pro \r\n";

  $headers .= "Reply-To:info@netgigs.pro \r\n";

  mail($to,$email_subject,$email_body,$headers);
  echo "Thank You for showing interest. Soon i will contact you regarding the same. Please co-operate with us to serve you better.";



//$servername = "dbs.netgigs.pro";
//$username = "dbrmuser";
//$password = "dbrmuser123";
require('/var/www/html/db.php');
$dbname = "netgigs";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"netgigs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO email(name,email,subject,message,date,time,who)
VALUES ('$name','$email','$subject','$message',CURDATE(), CURTIME(),'Netgigs')";

if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/* header( "refresh:3;url=http://nagendra.netgigs.pro/");
  echo("<html>
           <body>
               <table border='2' align='center'>
              <tr><th>Thank You for showing interest. Soon i will contact you regarding the same. Please co-operate with us to serve you better.Redirecting.....</th></tr>
              </table> 
            </body> 
       </html> ");
  // echo '<img src="http://settleinabroad.16mb.com/Images/loading.gif" border=0 align="center">'; 
  exit(); */
 ?>
