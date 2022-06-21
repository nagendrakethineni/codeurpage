<?php
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
    <script src='js/jquery.min.js'></script>
    <script src='js/table-sortable.min.js'></script>
</head> 
<div class="card shadow p-1">
              <input type='search' id='solvsearch' class='form-control w-25 float-left mb-1' placeholder='Search'>
              <div id='solvticketstable' class="ticketstable"></div>
              <div class='pages'></div>
          </div>    
            <script>
            var data5 = [
            <?php   
                  $sqlnew = "select reqid1,email,resume,product,plan,status,updted,updatedby,pending from cg where status='SOLVED' UNION ALL select reqid1,email,course,product,plan,status,updted,updatedby,pending from ot WHERE STATUS='SOLVED' UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from web_dev where STATUS='SOLVED' UNION ALL select reqid1,email,domainreq,product,plan,status,updted,updatedby,pending from web_hos where STATUS='SOLVED'UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from web_des where STATUS='SOLVED' UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from app_dev where STATUS='SOLVED'UNION ALL select reqid1,email,tagline,product,plan,status,updted,updatedby,pending from l_des where STATUS='SOLVED'";         
                  $resultnew = mysqli_query($conn,$sqlnew);
                  while($rownew = mysqli_fetch_array($resultnew)){  
                  $emailn = $rownew['email'];      
                  $sqlncount = "select * from signup where email='$emailn'";
                  $resultncount = mysqli_query($conn,$sqlncount);
                  $rown = mysqli_fetch_array($resultncount);                  
            ?>          
                    {
                        'reqid': '<?= $rownew['reqid1'] ?>',
                        'name': '<?= $rown['name'] ?>',
                        'email': '<?= $rownew['email'] ?>',
                        'date': '<?= $rown['date'] ?>',
                        'product': '<?= $rownew['product'] ?>',
                        'plan': '<?= $rownew['plan'] ?>',
                        'sub': '<?= $rownew['resume'] ?>',
                        'updated': '<?= $rownew['updted'] ?>',
                        'updatedby':'<?= $rownew['updatedby'] ?>',
                        'pending':'<?= $rownew['pending'] ?>',
                        'others': '<span onmouseover="document.getElementById(\'od<?= $rownew['reqid1'] ?>\').style.display=\'block\' " onmouseout="document.getElementById(\'od<?= $rownew['reqid1'] ?>\').style.display=\'none\' " class=\'font-weight-bold others\' id="o<?= $rownew['reqid1'] ?>" style="cursor: pointer;font-size: x-large;position:relative">&#8942;</span><div onmouseover="document.getElementById(\'od<?= $rownew['reqid1'] ?>\').style.display=\'block\' " onmouseout="document.getElementById(\'od<?= $rownew['reqid1'] ?>\').style.display=\'none\' "  style="display:none;position:absolute;width: 88px;min-height: 50px;background-color: rgb(255, 255, 255);z-index: 99;box-shadow: rgb(130, 120, 120) 1px 2px 3px;border: 1px solid rgb(238, 238, 238);" id="od<?= $rownew['reqid1'] ?>"><ul style="padding:0px"><li><a href="reqedit.php?id=<?= $rownew['reqid1'] ?>&product=<?= $rownew['product'] ?>" >Open</a><li><ul></div>'
                    },
            <?php } ?>
                      ]
                      
            var columns5 = {
                        'reqid': 'Req Id',
                        'name': 'Name',
                        'email': 'Email',
                        'date': 'Date',
                        'product': 'Product',
                        'plan': 'Plan',
                        'sub': 'Sub',
                        'updated': 'Last Update',
                        'updatedby': 'Updated By',
                        'pending': 'Pending',
                        'others': 'Others'
                        }
            var TestData5 = {
                data: data5,
                columns: columns5
            }
            var table5 = $('#solvticketstable').tableSortable({
                data: TestData5.data,
                columns: TestData5.columns,
                columnsHtml: function(value, key) {
                  return value;
                },
                pagination: 10,
                generateUniqueIds:true,
                showPaginationLabel: true,
                prevText: 'Prev',
                nextText: 'Next',
                searchField: $('#solvsearch')
            })
            </script>
</html>    
<?php }else{header("location: requirements.php");} ?>                            