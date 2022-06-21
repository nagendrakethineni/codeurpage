<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
require('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");
$sql = "select * from signup where email='$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if ($row['admin'] =='ADMIN'){
?>
<html>
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
   <script src='js/jquery.min.js'></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
</head> 
<script type="text/javascript">
          $(document).ready( function () {
    $('#webdev').DataTable();
} );
</script>

<div class="container-fluid">
              <?php 
            
            $sqlnew = "select * from signup where product like '%Web Development%'";
            $resultnew = mysqli_query($conn,$sqlnew); 
            
           ?>
            <table id='webdev' class="ticketstable table-striped">
                <thead>
                  <tr><th>Sl.No</th><th>Sub.Id</th><th>Email Id</th><th>Plan</th><th>Product</th><th>ACC.Status</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($rownew = mysqli_fetch_array($resultnew)){
                        $plan = explode("+",$rownew['admin']);
                        $product = explode("+",$rownew['product']);
                  ?>      
                <tr>
                        <td><?= $i ?></td>
                        <td><?= $rownew['id'] ?></td>
                        <td><?= $rownew['email'] ?></td>
                        <td><?= $plan[0] ?></td>
                        <td><?= $product[0] ?></td>
                        <td><?= $rownew['suspend'] ?></td>
                        <td><?= $rownew['status'] ?></td>
                    </tr>
                    <?php $i++; } ?>
             </tbody>
            </table>
          </div>  
      
</html>    
<?php }else{header("location: subscriptions.php");} ?>                            