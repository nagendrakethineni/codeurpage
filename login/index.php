<?php
include("header.php");
//session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
?>  
<html>
<head>    
    <title><?= $row['name'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='js/jquery.min.js'></script>
</head>
<body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
      <a class='navbar-brand' href='#'>Navbar</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav'>
          <li class='nav-item active'>
            <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='profile.php'>Profile</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='requirements.php'>Requirement</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='subscriptions.php' tabindex='-1' aria-disabled='true'>Subscriptions</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='products.php' >Products</a>
          </li>
        </ul>
      </div>
    </nav>
    <?php
        if($row['admin']=='ADMIN'){
        $sqlt = "SELECT count(id) from signup";
        $resultt = mysqli_query($conn,$sqlt);
        $tc = mysqli_fetch_array($resultt);
        $sqlc = "SELECT count(id) from signup where product LIKE '%Career%'";
        $resultc = mysqli_query($conn,$sqlc);
        $cc = mysqli_fetch_array($resultc);
        $sqlo = "SELECT count(id) from signup where product LIKE '%Online%'";
        $resulto = mysqli_query($conn,$sqlo);
        $oc = mysqli_fetch_array($resulto);
        $sqlh = "SELECT count(id) from signup where product LIKE '%Hosting%'";
        $resulth = mysqli_query($conn,$sqlh);
        $hc = mysqli_fetch_array($resulth);
        $sqld = "SELECT count(id) from signup where product LIKE '%Development%'";
        $resultd = mysqli_query($conn,$sqld);
        $dc = mysqli_fetch_array($resultd);
        $sqlcr = "SELECT COUNT(reqid) FROM cg";
        $resultcr = mysqli_query($conn,$sqlcr);
        $cr = mysqli_fetch_array($resultcr);
        $sqlor = "SELECT COUNT(reqid) FROM ot";
        $resultor = mysqli_query($conn,$sqlor);
        $or = mysqli_fetch_array($resultor);
        $sqlhr = "SELECT COUNT(reqid) FROM web_hos";
        $resulthr = mysqli_query($conn,$sqlhr);
        $hr = mysqli_fetch_array($resulthr);
        $sqldr = "SELECT COUNT(reqid) FROM web_dev";
        $resultdr = mysqli_query($conn,$sqldr);
        $dr = mysqli_fetch_array($resultdr);
        $tr = $cr[0]+$or[0]+$hr[0]+$dr[0]-4;
        $sqlrip = "select count(reqid) from cg where STATUS='INPROGRESS' UNION ALL select count(reqid) from ot where STATUS='INPROGRESS' UNION ALL select count(reqid) from web_hos where STATUS='INPROGRESS' UNION ALL select count(reqid) from web_dev where STATUS='INPROGRESS'";   
        $resultrip = mysqli_query($conn,$sqlrip);
        $count = mysqli_num_rows($resultrip);   
    ?>
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#4099ff,#73b4ff);color:white">
                    <span>Total Subscribers</span>
                    <h5><?= $tc[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#2ed8b6,#59e0c5);color:white">
                    <span>Career Guidance</span>
                    <h5><?= $cc[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FFB64D,#ffcb80);color:white">
                    <span>Online Training</span>
                    <h5><?= $oc[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FF5370,#ff869a);color:white">
                    <span>Web Hosting</span>
                    <h5><?= $hc[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#37bc9b,#71e4c8);color:white">
                    <span>Web Development</span>
                    <h5><?= $dc[0] ?></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-center py-3" style="border-color:#4099ff;color:#4099ff">
                    <span>Total Requirements</span>
                    <h5><?= $tr ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card text-center py-3" style="border-color:#2ed8b6;color:#2ed8b6" id="rip" onmouseover="document.getElementById('ripn').style.display='block';this.style.display='none'">
                    <span>Career Guidance</span>
                    <h5><?= $cr[0]-1 ?></h5>
                </div>
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#2ed8b6,#59e0c5);color:white;display:none" id="ripn"  onmouseout="document.getElementById('rip').style.display='block';this.style.display='none'">
                    <span>NEW</span>
                    <h5><?= $cr[0]-1 ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card text-center py-3" style="border-color:#FFB64D;color:#FFB64D" id="rip1" onmouseover="document.getElementById('rip1i').style.display='block';this.style.display='none'">
                    <span>Online Training</span>
                    <h5><?= $or[0]-1 ?></h5>
                </div>
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FFB64D,#ffcb80);color:white;display:none" id="rip1i"  onmouseout="document.getElementById('rip1').style.display='block';this.style.display='none'">
                    <span>INPROGRESS</span>
                    <h5><?= $or[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card text-center py-3" style="border-color:#FF5370;color:#FF5370" id="rip2" onmouseover="document.getElementById('rip2in').style.display='block';this.style.display='none'">
                    <span>Web Hosting</span>
                    <h5><?= $hr[0]-1 ?></h5>
                </div>
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FF5370,#ff869a);color:white;display:none" id="rip2in"  onmouseout="document.getElementById('rip2').style.display='block';this.style.display='none'">
                    <span>INPUTNEEDED</span>
                    <h5><?= $cr[0]-1 ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card text-center py-3" style="border-color:#37bc9b;color:#37bc9b" id="rip3" onmouseover="document.getElementById('rip3r').style.display='block';this.style.display='none'">
                    <span>Web Development</span>
                    <h5><?= $dr[0]-1 ?></h5>
                </div>
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#37bc9b,#71e4c8);color:white;display:none" id="rip3r"  onmouseout="document.getElementById('rip3').style.display='block';this.style.display='none'">
                    <span>REJECTED</span>
                    <h5><?= $cr[0]-1 ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
            $sqlmcg = "select count(reqid) from cg where pending='Admin'";
            $resultmcg = mysqli_query($conn,$sqlmcg);
            $mcg = mysqli_fetch_array($resultmcg);
            $sqlmot = "select count(reqid) from ot where pending='Admin'";
            $resultmot = mysqli_query($conn,$sqlmot);
            $mot = mysqli_fetch_array($resultmot);
            $sqlmwh = "select count(reqid) from web_hos where pending='Admin'";
            $resultmwh = mysqli_query($conn,$sqlmwh);
            $mwh = mysqli_fetch_array($resultmwh);
            $sqlmwd = "select count(reqid) from web_dev where pending='Admin'";
            $resultmwd = mysqli_query($conn,$sqlmwd);
            $mwd = mysqli_fetch_array($resultmwd);
            $tm = $mcg[0]+$mot[0]+$mwh[0]+$mwd[0];
        ?>
        <div class="row my-4">
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#4099ff,#73b4ff);color:white">
                    <span>Total Pending Messages</span>
                    <h5><?= $tm ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#2ed8b6,#59e0c5);color:white">
                    <span>Career Guidance</span>
                    <h5><?= $mcg[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FFB64D,#ffcb80);color:white">
                    <span>Online Training</span>
                    <h5><?= $mot[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#FF5370,#ff869a);color:white">
                    <span>Web Hosting</span>
                    <h5><?= $mwh[0] ?></h5>
                </div>
            </div>
            <div class="col">
                <div class="card shadow text-center py-3" style="background: linear-gradient(45deg,#37bc9b,#71e4c8);color:white">
                    <span>Web Development</span>
                    <h5><?= $mwd[0] ?></h5>
                </div>
            </div>
        </div>
    </div>
<?php }else{     
        $sqlmu = "select product from cg where pending='user' and email='$email' union all select product from ot where pending='user' and email='$email' union all select product from web_hos where pending='user' and email='$email' union all select product from web_dev where pending='user' and email='$email'";
        $resultmu = mysqli_query($conn,$sqlmu); ?>
        <div class="container">    
            <h5>You have new messages in following Products</h5>
<?php    while($mu = mysqli_fetch_array($resultmu)){ ?>    
            <p><?= $mu['product'] ?></p>    
<?php     }?>
        </div>    
<?php } ?>    
</body> 
<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
</html>
 <?php
}
?>