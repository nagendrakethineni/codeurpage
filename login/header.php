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
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "select * from signup where email='$email' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
$t = time();
$time = (date("d-M-Y | H:i",$t));   
$name = $row['name'];    
?>     
<div class='container-fluid'>
        <div class='row'>
            <div class='col'>
                <img src='images/logo.png' class="img-fluid"/>
            </div>
            <div class='col'>
                <ul class='float-right'>
                    <li>
                        <span><?= $row['name'] ?></span>    
                    </li>
                    <li>
                        <span><?= $time ?></span>    
                    </li>  
                    <li>
                        <a href='logout.php'>Logout</a>    
                    </li>    
                </ul>    
            </div>
        </div>
</div>
<?php 
}
?>