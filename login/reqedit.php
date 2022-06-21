<?php
session_start();
$email=$_SESSION['email'];
if($email==NULL)
{
        header("location: index.html");
}
else{
require('db.php');
$url = $_SERVER['REQUEST_URI'];
$url = explode('?',$url);
$urlo = explode('&',$url[1]);
$id = explode('=',$urlo[0]);
$product = explode('=',$urlo[1]);
//echo $product[1];
//echo $id[1];
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"test");
    $sqln = "select * from signup where email='$email' ";
    $resultn = mysqli_query($conn,$sqln);
    $rown = mysqli_fetch_array($resultn);
$t = time();
$time = (date("d-M-Y | H:i",$t));  

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(strpos($product[1], 'Guida') !== false){
    $sql = "select * from cg where reqid1='$id[1]'";
}
if(strpos($product[1], 'Training') !== false){
    $sql = "select * from ot where reqid1='$id[1]'";
}
if(strpos($product[1], 'Hosting') !== false){
    $sql = "select * from web_hos where reqid1='$id[1]'";
}
if(strpos($product[1], 'Develop') !== false){
    $sql = "select * from web_dev where reqid1='$id[1]'";
}
if(strpos($product[1], 'Design') !== false){
    $sql = "select * from web_des where reqid1='$id[1]'";
}
if(strpos($product[1], 'Development') !== false){
    $sql = "select * from app_dev where reqid1='$id[1]'";
}
if(strpos($product[1], 'Logo') !== false){
    $sql = "select * from l_des where reqid1='$id[1]'";
}
echo $product[1];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$sql1 = "select * from signup where email='$email'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
?>
<html>
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='js/jquery.min.js'></script>
    <script src='js/table-sortable.min.js'></script>
    <title><?= $row1['name'] ?></title>
</head>
<body style="background-image: url(https://www.transparenttextures.com/patterns/lined-paper-2.png);">    
    <div class='container-fluid bg-primary text-white'>
            <div class='row'>
                <div class='col'>
                    <img src='images/logo.png' />
                </div>
                <div class='col'>
                    <ul class='float-right'>
                        <li>
                            <span><?= $rown['name'] ?></span>    
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
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-md-3">
                <div class="card shadow p-2">
                    <h5 class="text-center">Personal Details</h5>
                    <table class="table">
                        <tr><th>Name:</th><td><?= $row1['name'] ?></td></tr>
                        <tr><th>Email:</th><td><?= $row['email'] ?></td></tr>
                        <tr><th>Gender:</th><td><?= $row1['gender'] ?></td></tr>
                        <tr><th>DOB:</th><td><?= $row1['dob'] ?></td></tr>
                        <tr><th>Date:</th><td><?= $row1['date'] ?></td></tr>
                        <tr><th>Product:</th><td><?= $row['product'] ?></td></tr>
                        <tr><th>Plan:</th><td><?= $row['plan'] ?></td></tr>
                        <tr><th>Status:</th><td><?= $row['STATUS'] ?></td></tr>
                        <tr><th>ID:</th><td><?= $row['reqid1'] ?></td></tr>
                        <tr><th>Address:</th><td><?= $row1['address'] ?></td></tr>
                        <tr><th>DP:</th><td><a href="userdp/<?= $row1['filename'] ?>" target="_blank"><img width="50px" src="userdp/<?= $row1['filename'] ?>" /></a></td></tr>
                    </table>
                </div>
                <div class="card shadow p-2 my-2">
                    <form id="statusform">
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="status" id="status">
                                        <option disabled selected value="CHANGE">CHANGE STATUS</option>
                                        <option value="NEW">NEW</option>
                                        <option value="INPROGRESS">ACCEPT</option>
                                        <option value="INPUTNEEDED">INPUT NEEDED</option>
                                        <option value="REJECTED">REJECT</option>
                                        <option value="SOLVED">SOLVED</option>
                                    </select>
                                    <input type="text" class="d-none" value="<?= $row['product'] ?>" name="product">
                                    <input type="text" class="d-none" value="<?= $row['email'] ?>" name="email">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Save</button>  
                                    </div>    
                                </div>     
                    </form>    
                </div>        
            </div>
            <div class="col-md-9">
                <div class="card shadow p-2">
                    <h5 class="text-center">Requirement Details</h5>
                    <?php 
                    if($row['product']=="Career Guidance"){ ?>
                      <a target="_blank" href="userresume/<?= $row['resume'] ?>" class="btn">Download Resume</a>
                      <div class="mx-auto">
                      <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
                      <div class="row">
                       <div class="col text-left"><button class="btn bg-secondary" id="prev">&#10094;</button></div>
                       <div class="col text-center"><span>Page: <span id="page_num"></span> / <span id="page_count"></span></span></div>
                       <div class="col text-right"><button class="btn bg-secondary" id="next">&#10095;</button></div>
                      </div>
                        <canvas width="100%" id="the-canvas"></canvas>
                        <script>
                        // If absolute URL from the remote server is provided, configure the CORS
                        // header on that server.
                        var url = 'userresume/<?= $row['resume'] ?>';

                        // Loaded via <script> tag, create shortcut to access PDF.js exports.
                        var pdfjsLib = window['pdfjs-dist/build/pdf'];

                        // The workerSrc property shall be specified.
                        pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

                        var pdfDoc = null,
                            pageNum = 1,
                            pageRendering = false,
                            pageNumPending = null,
                            scale = 0.8,
                            canvas = document.getElementById('the-canvas'),
                            ctx = canvas.getContext('2d');

                        /**
                         * Get page info from document, resize canvas accordingly, and render page.
                         * @param num Page number.
                         */
                        function renderPage(num) {
                          pageRendering = true;
                          // Using promise to fetch the page
                          pdfDoc.getPage(num).then(function(page) {
                            var viewport = page.getViewport({scale: scale});
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                              canvasContext: ctx,
                              viewport: viewport
                            };
                            var renderTask = page.render(renderContext);

                            // Wait for rendering to finish
                            renderTask.promise.then(function() {
                              pageRendering = false;
                              if (pageNumPending !== null) {
                                // New page rendering is pending
                                renderPage(pageNumPending);
                                pageNumPending = null;
                              }
                            });
                          });

                          // Update page counters
                          document.getElementById('page_num').textContent = num;
                        }

                        /**
                         * If another page rendering in progress, waits until the rendering is
                         * finised. Otherwise, executes rendering immediately.
                         */
                        function queueRenderPage(num) {
                          if (pageRendering) {
                            pageNumPending = num;
                          } else {
                            renderPage(num);
                          }
                        }

                        /**
                         * Displays previous page.
                         */
                        function onPrevPage() {
                          if (pageNum <= 1) {
                            return;
                          }
                          pageNum--;
                          queueRenderPage(pageNum);
                        }
                        document.getElementById('prev').addEventListener('click', onPrevPage);

                        /**
                         * Displays next page.
                         */
                        function onNextPage() {
                          if (pageNum >= pdfDoc.numPages) {
                            return;
                          }
                          pageNum++;
                          queueRenderPage(pageNum);
                        }
                        document.getElementById('next').addEventListener('click', onNextPage);

                        /**
                         * Asynchronously downloads PDF.
                         */
                        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                          pdfDoc = pdfDoc_;
                          document.getElementById('page_count').textContent = pdfDoc.numPages;

                          // Initial/first page rendering
                          renderPage(pageNum);
                        });
                        </script>
                        </div>
                        <?php }
                if($row['product']=="Online Training"){ ?>
                    <div class="container">
                        <table class="table table-bordered">
                            <tr><th>Course Name:</th><td><?= $row['course'] ?></td></tr>    
                            <tr><th>Course Type:</th><td><?= $row['coursetype'] ?></td></tr>    
                            <tr><th>Preffered Batch:</th><td><?= $row['prefbatch'] ?></td></tr>    
                            <tr><th>Start Date:</th><td><?= $row['startdate'] ?></td></tr>    
                            <tr><th>End Date:</th><td><?= $row['enddate'] ?></td></tr>    
                            <tr><th>Goal</th><td><?= $row['goal'] ?></td></tr>   
                        </table>
                    </div>    
                    <?php }
                if($row['product']=="Web Hosting"){ ?>
                    <div class="container">
                        <table class="table table-bordered">
                            <tr><th>Do you have Domain:</th><td><?= $row['domainreq'] ?></td></tr>
                            <tr><th>Available Domain</th><td><?= $row['avbdom'] ?></td></tr>
                            <tr><th>Purchase Vendor Name</th><td><?= $row['purven'] ?></td></tr>
                            <tr><th>Validity in Years</th><td><?= $row['val'] ?></td></tr>
                            <tr><th>Domain Other Details</th><td><?= $row['oth'] ?></td></tr>
                            <tr><th>Domain</th><td><?= $row['dpur'] ?></td></tr>
                            <tr><th>Preferred Domain</th><td><?= $row['prdom'] ?></td></tr>
                            <tr><th>Netgigs Sub-Domain</th><td><?= $row['prsdom'] ?></td></tr>
                        </table>
                    </div>
                    <?php }
                if($row['product']=="Web Development"){  ?>
                    <div class="container">
                        <table class="table table-bordered">
                                <tr><th>Type of Site</th><td><?= $row['typereq'] ?></td></tr>
                                <tr><th>Purpose of Site</th><td><?= $row['purp'] ?></td></tr>
                                <tr><th>No. of Pages</th><td><?= $row['nopg'] ?></td></tr>
                                <tr><th>List of Products</th><td><?= $row['purl'] ?></td></tr>
                                <tr><th>Description</th><td><?= $row['description'] ?></td></tr>
                                <tr><th>Mobile Friendly</th><td><?= $row['mf'] ?></td></tr>
                                <tr><th>Logo Path</th><td><?= $row['logo'] ?></td></tr>
                                <tr><th>Specific Images</th><td><?= $row['files'] ?></td></tr>
                            </table>
                    </div>
                    <?php }
                if($row['product']=="App Development"){  ?>
                    <div class="container">
                        <table class="table table-bordered">
                                <tr><th>Type of Site</th><td><?= $row['typereq'] ?></td></tr>
                                <tr><th>Purpose of Site</th><td><?= $row['purp'] ?></td></tr>
                                <tr><th>No. of Pages</th><td><?= $row['nopg'] ?></td></tr>
                                <tr><th>No. of Users</th><td><?= $row['nou'] ?></td></tr>
                                <tr><th>List of Products</th><td><?= $row['purl'] ?></td></tr>
                                <tr><th>Description</th><td><?= $row['description'] ?></td></tr>
                                <tr><th>Mobile Friendly</th><td><?= $row['mf'] ?></td></tr>
                                <tr><th>Logo Path</th><td><?= $row['logo'] ?></td></tr>
                                <tr><th>Specific Images</th><td><?= $row['files'] ?></td></tr>
                            </table>
                    </div>
                    <?php } 
                if($row['product']=="Logo Design"){  ?>
                    <div class="container">
                        <table class="table table-bordered">
                                
                                <tr><th>Purpose of Logo</th><td><?= $row['purp'] ?></td></tr>
                                <tr><th>Description</th><td><?= $row['description'] ?></td></tr>
                                <tr><th>Tag Line </th><td><?= $row['tagline'] ?></td></tr>
                                <tr><th>Favicon/Short Icon</th><td><?= $row['favicon'] ?></td></tr>
                                
                            </table>
                    </div>
                    <?php }
                if($row['product']=="Web Design"){  ?>
                    <div class="container">
                        <table class="table table-bordered">
                                <tr><th>Type of Site</th><td><?= $row['typereq'] ?></td></tr>
                                <tr><th>Purpose of Site</th><td><?= $row['purp'] ?></td></tr>
                                <tr><th>No. of Pages</th><td><?= $row['nopg'] ?></td></tr>
                                <tr><th>List of Products</th><td><?= $row['purl'] ?></td></tr>
                                <tr><th>Description</th><td><?= $row['description'] ?></td></tr>
                                <tr><th>Mobile Friendly</th><td><?= $row['mf'] ?></td></tr>
                                <tr><th>Logo Path</th><td><?= $row['logo'] ?></td></tr>
                                <tr><th>Specific Images</th><td><?= $row['files'] ?></td></tr>
                            </table>
                    </div>
                    <?php } ?>
                </div>
                <div class="card shadow p-2 my-2">
                 <h5 class="text-center">Discussion Box</h5>
                    <div style="max-height:46vh;overflow-y:auto">
                <?php 
                    $sqlmsg = "select * from msg where id='$id[1]'";
                    $resultmsg = mysqli_query($conn,$sqlmsg);
                    $rowmsg = mysqli_fetch_array($resultmsg);
                    $reply = explode("^",$rowmsg['msg']);
                    $count = count($reply);
                    for($i=1;$i<$count;$i++){ 
                    $msg = explode("`",$reply[$i]); 
                    $compare = explode("|",$msg[1]);    
                    if($compare[0]==$rown['name']){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}     
                ?>
                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                    <!--<span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                <?php    } ?>
                    </div>    
                </div>    
                <div class="card shadow p-2 my-2">
                    <form id="msgform">
                        <div class="row">    
                            <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                            <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                            <div class="col-1"><a href="requirements.php" class="btn bg-primary text-white float-right">Back to Home</a></div>
                            <div class="col-1"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                        </div>  
                        <input type="text" class="d-none" name="id" value="<?= $row['reqid1'] ?>">                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>        
       $("#statusform").on('submit', function(e){
         e.preventDefault();
           var x=document.getElementById('status');
           if(x.value=='CHANGE'){
                alert('Please select option');
              }
           else{
        var formData = $(this).serialize();
           $.ajax({
            type: 'POST',
            url: 'status.php',
            data: formData,
            success: function(response) {
                alert(response)
                //$("#result").html(response);
                  window.location.href = "requirements.php";
           }
        });
           }
       });       
       $("#msgform").on('submit', function(e){
         e.preventDefault();
        var formData = $(this).serialize();
           $.ajax({
            type: 'POST',
            url: 'msg.php',
            data: formData,
            success: function(response) {
                alert(response)
                //$("#result").html(response);
                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
            }
        });
       });    
</script>
</body>   
</html>  
<?php } ?>