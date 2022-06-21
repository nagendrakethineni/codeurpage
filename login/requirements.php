<?php
include("header.php");
$product = explode("+",$row['product']);
$plan = explode("+",$row['admin']);
?>
<html>
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='js/jquery.min.js'></script>
    <script src='js/table-sortable.min.js'></script>
    <title><?= $row['name'] ?></title>
</head>
<body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary' id="navbar">
      <a class='navbar-brand' href='#'>Navbar</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='profile.php'>Profile</a>
          </li>
          <li class='nav-item active'>
            <a class='nav-link' href='requirements.php'>Requirement</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='subscriptions.php' tabindex='-1' aria-disabled='true'>Subscriptions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
        </ul>
      </div>
    </nav>
    <?php 
        if($row['admin'] =='ADMIN'){ ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="#new" aria-selected="true">New Req</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="inprogress-tab" data-toggle="tab" href="#inprogress" role="tab" aria-controls="#inprogress" aria-selected="false">In Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="inputneeded-tab" data-toggle="tab" href="#inputneeded" role="tab" aria-controls="#inoutneeded" aria-selected="false">Input Needed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="#rejected" aria-selected="false">Rejected</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="solved-tab" data-toggle="tab" href="#solved" role="tab" aria-controls="#solved" aria-selected="false">Solved</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active p-3" id="new" role="tabpanel" aria-labelledby="new-tab">
          <div class="card shadow p-1">
              <input type='search' id='newsearch' class='form-control w-25 float-left mb-1' placeholder='Search'>
              <div id='newticketstable' class="ticketstable"></div>
              <div class='pages'></div>
          </div>    
            <script>
            var data1 = [
            <?php   
                  $sqlnew = "select reqid1,email,resume,product,plan,status,updted,updatedby,pending from cg where status='NEW' UNION ALL select reqid1,email,course,product,plan,status,updted,updatedby,pending from ot where STATUS='NEW' UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from web_dev where STATUS='NEW' UNION ALL select reqid1,email,domainreq,product,plan,status,updted,updatedby,pending from web_hos where STATUS='NEW' UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from web_des where STATUS='NEW' UNION ALL select reqid1,email,typereq,product,plan,status,updted,updatedby,pending from app_dev where STATUS='NEW' UNION ALL select reqid1,email,tagline,product,plan,status,updted,updatedby,pending from l_des where STATUS='NEW'";         
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
                      
            var columns1 = {
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
            var TestData1 = {
                data: data1,
                columns: columns1
            }
            var table1 = $('#newticketstable').tableSortable({
                data: TestData1.data,
                columns: TestData1.columns,
                columnsHtml: function(value, key) {
                  return value;
                },
                pagination: 10,
                generateUniqueIds:true,
                showPaginationLabel: true,
                prevText: 'Prev',
                nextText: 'Next',
                searchField: $('#newsearch')
            })
            </script>
      </div>      
      <div class="tab-pane fade p-3" id="inprogress" role="tabpanel" aria-labelledby="inprogress-tab">
          <div id="inpresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="inputneeded" role="tabpanel" aria-labelledby="inputneeded-tab">
          <div id="inpnresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
         <div id="rejectedresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="solved" role="tabpanel" aria-labelledby="solved-tab">
         <div id="solvedresult"></div>
      </div>
    </div>
     <?php   }
// clients 
     else{ ?>
    <!-- TABS-->  
    <section>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php 
        if(strpos($row['product'], 'Guida') !== false){   ?>     
          <li class="nav-item">
            <a class="nav-link" id="cg-tab" data-toggle="tab" href="#cg" role="tab" aria-controls="cg" aria-selected="true">Career Guidance</a>
          </li>
          <?php } 
        if(strpos($row['product'], 'Online') !== false){   ?>  
          <li class="nav-item">
            <a class="nav-link" id="ot-tab" data-toggle="tab" href="#ot" role="tab" aria-controls="ot" aria-selected="false">Online Training</a>
          </li>
          <?php } 
        if(strpos($row['product'], 'Hosting') !== false){   ?>  
          <li class="nav-item">
            <a class="nav-link" id="wh-tab" data-toggle="tab" href="#wh" role="tab" aria-controls="wh" aria-selected="false">Web Hosting</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'Develop') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="wd-tab" data-toggle="tab" href="#wd" role="tab" aria-controls="wd" aria-selected="false">Web Devlopment</a>
          </li>
            <?php }
        if(strpos($row['product'], 'Start') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="sst-tab" data-toggle="tab" href="#sst" role="tab" aria-controls="sst" aria-selected="false">Smart Start</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'OFFload') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="sof-tab" data-toggle="tab" href="#sof" role="tab" aria-controls="sof" aria-selected="false">Smart Offload</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'Health') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="she-tab" data-toggle="tab" href="#she" role="tab" aria-controls="she" aria-selected="false">Smart Health</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'Logo') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="ldes-tab" data-toggle="tab" href="#ldes" role="tab" aria-controls="ldes" aria-selected="false">Logo Design</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'App') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="ad-tab" data-toggle="tab" href="#ad" role="tab" aria-controls="ad" aria-selected="false">App Dev</a>
          </li>
            <?php } 
        if(strpos($row['product'], 'Web Design') !== false){   ?>
          <li class="nav-item">
            <a class="nav-link" id="wdes-tab" data-toggle="tab" href="#wdes" role="tab" aria-controls="wdes" aria-selected="false">Web Design</a>
          </li>
            <?php } ?>    
        </ul>
        <!--Tab contents -->
        <div class="tab-content" id="myTabContent">
        <?php if(strpos($row['product'], 'Guida') !== false){   ?>
            <div class="tab-pane fade show" id="cg" role="tabpanel" aria-labelledby="cg-tab">
                <div class="container-fluid" id="cg">
                    <?php
                        $sqlcg = "select * from cg where email='$email'";
                        $sqlcgresult=mysqli_query($conn,$sqlcg);
                        $rowcg=mysqli_fetch_array($sqlcgresult);
                        $countcg=mysqli_num_rows($sqlcgresult);
                        if($countcg!==0){  ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <p><label>Subscribed to: <?= $product[5] ?> </label></p>
                                    <p><label>Subscribed Plan: <?= $plan[5] ?></label></p>
                                    <p><label>Status: <?= $rowcg['STATUS'] ?></label></p>
                                    <a target="_blank" href="userresume/<?= $rowcg['resume'] ?>" class="btn">Download Resume</a>
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
                                        var url = 'userresume/<?= $rowcg['resume'] ?>';

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
                                </div>    
                            </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowcg['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="cgmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowcg['reqid1'] ?>">
                                </form>
                                </div>
                            </div>
                        </div>    
                    <?php
                        }else {
                    ?>
                    <div class="container col-md-6">
                        <h4 class="text-center">Please fill the following to understand your profile</h4>
                        <form id="cgreq">
                            <label>Plan:<?= $plan[5] ?></label><br>
                            <label>Upload Resume</label><br>
                            <div class="custom-file mb-3 my-3 w-25">
                              <input type="file" class="custom-file-input" id="customFile" name="filename" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <button type="submit" class="btn bg-primary text-white">SUBMIT</button>
                        </form>
                    </div>    
                    <?php } ?>
                </div>
            </div>
          <?php } 
        if(strpos($row['product'], 'Online') !== false){   ?> 
          <div class="tab-pane fade" id="ot" role="tabpanel" aria-labelledby="ot-tab">
            <div class="container-fluid" id="ot">
                <?php
                    $sqlot = "select * from ot where email='$email'";
                    $sqlotresult=mysqli_query($conn,$sqlot);
                    $rowot=mysqli_fetch_array($sqlotresult);
                    $countot=mysqli_num_rows($sqlotresult);
                    if($countot!==0){ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <table class="table table-bordered">
                                        <tr><th>Subscribed to:</th><td><?= $product[6] ?></td></tr>
                                        <tr><th>Subscribed Plan:</th><td><?= $plan[6] ?></td></tr>
                                        <tr><th>Status:</th><td><?= $rowot['STATUS'] ?></td></tr>
                                        <tr><th>Course Name:</th><td><?= $rowot['course'] ?></td></tr>    
                                        <tr><th>Course Type:</th><td><?= $rowot['coursetype'] ?></td></tr>    
                                        <tr><th>Preffered Batch:</th><td><?= $rowot['prefbatch'] ?></td></tr>    
                                        <tr><th>Start Date:</th><td><?= $rowot['startdate'] ?></td></tr>    
                                        <tr><th>End Date:</th><td><?= $rowot['enddate'] ?></td></tr>    
                                        <tr><th>Goal</th><td><?= $rowot['goal'] ?></td></tr>    
                                    </table>  
                                </div>    
                            </div> 
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowot['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="otmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowot['reqid1'] ?>">
                                </form>
                                </div>
                            </div>
                        </div>    
                <?php    } else {    ?>
            <div class="container col-md-6">
                <h4 class="text-center">Please fill the following to understand your profile</h4>
                <form id="otreq">
                    <label>Plan:<?= $plan[6] ?></label><br>
                    <select class="form-control my-2" name="course" required>
                        <option selected disabled>Course Name</option>
                        <option value="JAVA">JAVA</option>
                        <option value="HTML">HTML/CSS</option>
                        <option value="PHP">PHP</option>
                        <option value="Java Scripting">Java Scripting</option>
                        <option value="Vb Scripting">Vb Scripting</option>
                        <option value="Data Base Management">Data Base Management</option>
                        <option value="Hardware/System Administration">Hardware/System Administration</option>
                        <option value="Basic Networking concepts">Basic Networking concepts</option>
                        <option value="IT Incedent Management">IT Incedent Management</option>
                    </select>
                    <select id="cotype" required name="coursetype" class="form-control w-75 d-inline" onchange="cotyreqfun()">
                        <option selected disabled>Course Type</option>
                        <option value="Daily">Daily</option>
                        <option value="Week End">Week End</option>
                        <option value="Crash Course">Crash Course</option>
                    </select>
                    <span id="dailyinfo" class="dnone" data-title="Daily you will be elligible for 1hr of session of selected course for 30 days "><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <span id="weekendinfo" class="dnone" data-title="4hrs session will be Available on sundays upto to 30hrs"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <span id="crashinfo" class="dnone" data-title="you can choose your choise of time and days "><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <select name="prefbatch" required class="form-control my-2">
                        <option selected disabled>Preferred Batch</option>
                        <option value="09:00 - 10:00"> Morning batch(09:00 - 10:00) </option>
                        <option value="10:00 - 11:00"> Morning Batch(10:00 - 11:00) </option>
                        <option value="12:30 - 01:30"> Midday Batch(12:30 - 01:30) </option>
                        <option value="02:30 - 03:30"> Afternoon batch(02:30 - 03:30) </option>
                        <option value="07:00 - 08:00"> Evening batch(07:00 - 08:00) </option>
                    </select>
                    <p><input id="startdate" name="startdate" width="270" placeholder="Start Date" required/></p>
                    <input id="enddate" name="enddate" width="270" placeholder="End Date" required/>
                    <input class="form-control my-2" type="text" required name="goal" placeholder="Goal of pursuing">
                    <button class="btn bg-primary text-white" type="submit">SUBMIT</button>
                </form>
              </div>    
            <?php } ?>    
            </div>   
          </div> 
          <?php } 
        if(strpos($row['product'], 'Hosting') !== false){  ?>      
          <div class="tab-pane fade" id="wh" role="tabpanel" aria-labelledby="wh-tab">
              <div class="container-fluid" id="wh">
                  <?php
                    $sqlwebhos = "select * from web_hos where email='$email'";
                    $sqlwebhosresult=mysqli_query($conn,$sqlwebhos);
                    $rowwebhos=mysqli_fetch_array($sqlwebhosresult);
                    $countwebhos=mysqli_num_rows($sqlwebhosresult);
                    if($countwebhos!==0){ ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center">Submitted Requirements</h4>
                            <div class="card shadow p-2 my-2">
                                <table class="table table-bordered">
                                    <tr><th>Subscribed to:</th><td><?= $product[2] ?></td></tr>
                                    <tr><th>Subscribed Plan:</th><td><?= $plan[2] ?></td></tr>
                                    <tr><th>Status:</th><td><?= $rowwebhos['STATUS'] ?></td></tr>
                                    <tr><th>Do you have Domain:</th><td><?= $rowwebhos['domainreq'] ?></td></tr>
                                    <tr><th>Available Domain</th><td><?= $rowwebhos['avbdom'] ?></td></tr>
                                    <tr><th>Purchase Vendor Name</th><td><?= $rowwebhos['purven'] ?></td></tr>
                                    <tr><th>Validity in Years</th><td><?= $rowwebhos['val'] ?></td></tr>
                                    <tr><th>Domain Other Details</th><td><?= $rowwebhos['oth'] ?></td></tr>
                                    <tr><th>Domain</th><td><?= $rowwebhos['dpur'] ?></td></tr>
                                    <tr><th>Preferred Domain</th><td><?= $rowwebhos['prdom'] ?></td></tr>
                                    <tr><th>Netgigs Sub-Domain</th><td><?= $rowwebhos['prsdom'] ?></td></tr>
                                </table>
                            </div>
                        </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowwebhos['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="whmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowwebhos['reqid1'] ?>">
                                </form>
                                </div>
                            </div>    
                    </div>  
                  <?php   }else{ ?>
                  <div class="container col-md-6">
                        <form id="whreq">
                            <lable>Plan:<?= $plan[2] ?></lable>
                            <select class="form-control my-2" name="domainreq" id="domainreq" onchange="domainreqfun()">
                                <option disabled selected>Do you have a Domain</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Netgigs Sub Domain">Netgigs Sub Domain</option>
                            </select>
                            <div id="yes" class="dnone">
                                <input class="form-control my-2" type="text" name="avbdom" placeholder="Enter Available Domain">
                                <input class="form-control my-2" type="text" name="purven" placeholder="Purchase Vendor Name">
                                <input class="form-control my-2" type="text" name="val" placeholder="Validity in Years">
                                <input class="form-control my-2" type="text" name="oth" placeholder="Domain other details">
                            </div> 
                            <div class="dnone" id="select">
                                <label>Opt one:</label>
                                <input type="radio" onclick="domainpurfun()" name="dpur" id="domainpur" value="I will get"> I will get
                                <input type="radio" name="dpur" id="2" onclick="domainpurfun()" value="Netgigs will get"> Netgigs will get
                            </div>
                            <div class="dnone" id="prdom">
                                <input class="form-control my-2" type="text" name="prdom" placeholder="Enter Prefered Domain with extension">
                            </div>
                            <div class="dnone" id="prsdom">
                                <input class="form-control my-2 w-75 d-inline" type="text" name="prsdom" placeholder="Enter Prefered Sub Domain"><span>.netgigs.pro</span>
                            </div>
                                <button type="submit" id="buttons" class="btn bg-primary text-white dnone">SUBMIT</button> 
                        </form>
                </div>
                  <?php } ?>
              </div>
          </div>
          <?php }
        if(strpos($row['product'], 'Web Design') !== false){   ?> 
          <div class="tab-pane fade" id="wdes" role="tabpanel" aria-labelledby="wdes-tab">
              <div class="container-fluid">
                  <?php 
                        $sqlwebdes = "select * from web_des where email='$email'";
                        $sqlwebdesresult=mysqli_query($conn,$sqlwebdes);
                        $rowwebdes=mysqli_fetch_array($sqlwebdesresult);
                        $countwebdes=mysqli_num_rows($sqlwebdesresult);
                        if($countwebdes!==0){ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <table class="table table-bordered">
                                        <tr><th>Subscribed to:</th><td><?= $product[1] ?></td></tr>
                                        <tr><th>Subscribed Plan:</th><td><?= $plan[1] ?></td></tr>
                                        <tr><th>Status:</th><td><?= $rowwebdes['STATUS'] ?></td></tr>
                                        <tr><th>Type of Site</th><td><?= $rowwebdes['typereq'] ?></td></tr>
                                        <tr><th>Purpose of Site</th><td><?= $rowwebdes['purp'] ?></td></tr>
                                        <tr><th>No. of Pages</th><td><?= $rowwebdes['nopg'] ?></td></tr>
                                        <tr><th>List of Products</th><td><?= $rowwebdes['purl'] ?></td></tr>
                                        <tr><th>Description</th><td><?= $rowwebdes['description'] ?></td></tr>
                                        <tr><th>Mobile Friendly</th><td><?= $rowwebdes['mf'] ?></td></tr>
                                        <tr><th>Logo Path</th><td><?= $rowwebdes['logo'] ?></td></tr>
                                        <tr><th>Specific Images</th><td><?= $rowwebdes['files'] ?></td></tr>
                                    </table>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowwebdes['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="wdesmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowwebdes['reqid1'] ?>">
                                </form>
                                </div>
                            </div> 
                          </div>  
                    <?php    }
                    else {
                  ?>
            <div class="container col-md-6">      
                <form id="wdesreq">
                    <lable>Plan:<?= $plan[1] ?></lable>
                    <select id="typereq" onchange="typereqfun()" required name="typereq" class="form-control my-2">
                        <option disabled selected>Type of Site</option>
                        <option>Blog</option>
                        <option>CRM</option>
                        <option>Startup Business</option>
                        <option>Personel page</option>
                        <option>Landing page</option>
                        <option>E-commerce site</option>
                        <option>IT Business site services</option>
                        <option>Ticketing or Support system</option>
                        <option>Back End Operations</option>
                        <option>Other</option>
                    </select>
                    <input class="form-control my-2" type="text" name="purp" placeholder="Purpose of site: ">
                    <select id="nopg" onchange="nopgreq()" name="nopg" class="form-control ">
                        <option selected disabled>No of pages:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>Many</option>
                    </select>
                    <input class="form-control my-2" type="text" required name="purl" placeholder="List Your Products separating by ,">
                    <input class="form-control my-2" type="text" required name="description" placeholder="Describe your site: ">
                    <label>Mobile friendly site: </label>
                    <input type="radio" required name="mf" value="Yes">Yes
                    <input type="radio" required name="mf" value="No">No<br>
                    <label>Give a logo: </label>
                    <input type="radio" required name="logoup" value="Yes" onclick="showbrowse()">Yes
                    <input type="radio" required name="logoup" value="No" onclick="showbrowse()">No
                    <span data-title="If you wish us to design the logo please visit : ">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </span><br>
                    <div class="custom-file mb-3 my-3 w-50 dnone" id="logoupbtn">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>   
                    <label>Upload Specific Images to be on site: </label><br>
                    <div class="custom-file mb-3 my-3 w-50">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> <br> 
                    <button class="btn bg-primary text-white" type="submit">SUBMIT</button>
                </form> 
            </div>    
                <?php } ?>  
              </div>
          </div>

          <?php }
        if(strpos($row['product'], 'App Dev') !== false){   ?> 
          <div class="tab-pane fade" id="ad" role="tabpanel" aria-labelledby="ad-tab">
              <div class="container-fluid">
                  <?php 
                        $sqlad = "select * from app_dev where email='$email'";
                        $sqladresult=mysqli_query($conn,$sqlad);
                        $rowad=mysqli_fetch_array($sqladresult);
                        $countad=mysqli_num_rows($sqladresult);
                        if($countad!==0){ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <table class="table table-bordered">
                                        <tr><th>Subscribed to:</th><td><?= $product[3] ?></td></tr>
                                        <tr><th>Subscribed Plan:</th><td><?= $plan[3] ?></td></tr>
                                        <tr><th>Status:</th><td><?= $rowad['STATUS'] ?></td></tr>
                                        <tr><th>Type of Site</th><td><?= $rowad['typereq'] ?></td></tr>
                                        <tr><th>Purpose of Site</th><td><?= $rowad['purp'] ?></td></tr>
                                        <tr><th>No. of Pages</th><td><?= $rowad['nopg'] ?></td></tr>
                                        <tr><th>No. of Users</th><td><?= $rowad['nou'] ?></td></tr>
                                        <tr><th>List of Products</th><td><?= $rowad['purl'] ?></td></tr>
                                        <tr><th>Description</th><td><?= $rowad['description'] ?></td></tr>
                                        <tr><th>Mobile Friendly</th><td><?= $rowad['mf'] ?></td></tr>
                                        <tr><th>Logo Path</th><td><?= $rowad['logo'] ?></td></tr>
                                        <tr><th>Specific Images</th><td><?= $rowad['files'] ?></td></tr>
                                    </table>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowad['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="adevmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowad['reqid1'] ?>">
                                </form>
                                </div>
                            </div> 
                          </div>  
                    <?php    }
                    else {
                  ?>
            <div class="container col-md-6">      
                <form id="adreq">
                    <lable>Plan:<?= $plan[3] ?></lable>
                    <select id="typereq" onchange="typereqfun()" required name="typereq" class="form-control my-2">
                        <option disabled selected>Type of Site</option>
                        <option>Blog</option>
                        <option>CRM</option>
                        <option>ERP</option>
                        <option>Ticketing or Support system</option>
                        <option>Back End Operations</option>
                        <option>Other</option>
                    </select>
                    <input class="form-control my-2" type="text" name="purp" placeholder="Purpose of site: ">
                    <select id="nopg" onchange="nopgreq()" name="nopg" class="form-control ">
                        <option selected disabled>No of pages:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>Many</option>
                    </select><br>
                    <select id="nou" onchange="noureq()" name="nou" class="form-control ">
                        <option selected disabled>No of Users:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>Many</option>
                    </select>
                    <input class="form-control my-2" type="text" required name="purl" placeholder="List Your Products separating by ,">
                    <input class="form-control my-2" type="text" required name="description" placeholder="Describe your site: ">
                    <label>Mobile friendly site: </label>
                    <input type="radio" required name="mf" value="Yes">Yes
                    <input type="radio" required name="mf" value="No">No<br>
                    <label>Give a logo: </label>
                    <input type="radio" required name="logoup" value="Yes" onclick="showbrowse()">Yes
                    <input type="radio" required name="logoup" value="No" onclick="showbrowse()">No
                    <span data-title="If you wish us to design the logo please visit : ">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </span><br>
                    <div class="custom-file mb-3 my-3 w-50 dnone" id="logoupbtn">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>   
                    <label>Upload Specific Images to be on Application: </label><br>
                    <div class="custom-file mb-3 my-3 w-50">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> <br> 
                    <button class="btn bg-primary text-white" type="submit">SUBMIT</button>
                </form> 
            </div>    
                <?php } ?>  
              </div>
          </div>

          <?php }   
        if(strpos($row['product'], 'Logo Des') !== false){   ?> 
          <div class="tab-pane fade" id="ldes" role="tabpanel" aria-labelledby="ldes-tab">
              <div class="container-fluid">
                  <?php 
                        $sqlld = "select * from l_des where email='$email'";
                        $sqlldresult=mysqli_query($conn,$sqlld);
                        $rowld=mysqli_fetch_array($sqlldresult);
                        $countld=mysqli_num_rows($sqlldresult);
                        if($countld!==0){ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <table class="table table-bordered">
                                        <tr><th>Subscribed to:</th><td><?= $product[4] ?></td></tr>
                                        <tr><th>Subscribed Plan:</th><td><?= $plan[4] ?></td></tr>
                                        <tr><th>Status:</th><td><?= $rowld['STATUS'] ?></td></tr>
                                        <tr><th>Purpose of Site</th><td><?= $rowld['purp'] ?></td></tr>
                                        <tr><th>TagLine: </th><td><?= $rowld['tagline'] ?></td></tr>
                                        <tr><th>Description</th><td><?= $rowld['description'] ?></td></tr>
                                        <tr><th>Fav Icon</th><td><?= $rowld['favicon'] ?></td></tr>
                                    </table>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowld['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="ldmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowld['reqid1'] ?>">
                                </form>
                                </div>
                            </div> 
                          </div>  
                    <?php    }
                    else {
                  ?>
            <div class="container col-md-6">      
                <form id="ldreq">
                    <lable>Plan:<?= $plan[4] ?></lable>
                    <input class="form-control my-2" type="text" name="purp" placeholder="Purpose of Logo: ">
                    <input class="form-control my-2" type="text" required name="description" placeholder="Describe : ">
                    <input class="form-control my-2" type="text" required name="tagline" placeholder="Tagline : ">
                    <label>Fav Icon: </label>
                    <input type="radio" required name="fi" value="Yes" >Yes
                    <input type="radio" required name="fi" value="No" >No
                    <button class="btn bg-primary text-white" type="submit">SUBMIT</button>
                </form> 
            </div>    
                <?php } ?>  
              </div>
          </div>

          <?php }     
        if(strpos($row['product'], 'Develop') !== false){   ?> 
          <div class="tab-pane fade" id="wd" role="tabpanel" aria-labelledby="wd-tab">
              <div class="container-fluid">
                  <?php 
                        $sqlwebdev = "select * from web_dev where email='$email'";
                        $sqlwebdevresult=mysqli_query($conn,$sqlwebdev);
                        $rowwebdev=mysqli_fetch_array($sqlwebdevresult);
                        $countwebdev=mysqli_num_rows($sqlwebdevresult);
                        if($countwebdev!==0){ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Submitted Requirements</h4>
                                <div class="card shadow p-2 my-2">
                                    <table class="table table-bordered">
                                        <tr><th>Subscribed to:</th><td><?= $product[0] ?></td></tr>
                                        <tr><th>Subscribed Plan:</th><td><?= $plan[0] ?></td></tr>
                                        <tr><th>Status:</th><td><?= $rowwebdev['STATUS'] ?></td></tr>
                                        <tr><th>Type of Site</th><td><?= $rowwebdev['typereq'] ?></td></tr>
                                        <tr><th>Purpose of Site</th><td><?= $rowwebdev['purp'] ?></td></tr>
                                        <tr><th>No. of Pages</th><td><?= $rowwebdev['nopg'] ?></td></tr>
                                        <tr><th>List of Products</th><td><?= $rowwebdev['purl'] ?></td></tr>
                                        <tr><th>Description</th><td><?= $rowwebdev['description'] ?></td></tr>
                                        <tr><th>Mobile Friendly</th><td><?= $rowwebdev['mf'] ?></td></tr>
                                        <tr><th>Logo Path</th><td><?= $rowwebdev['logo'] ?></td></tr>
                                        <tr><th>Specific Images</th><td><?= $rowwebdev['files'] ?></td></tr>
                                    </table>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                    <h4 class="text-center">Discussion Box</h4>
                                    <div class="card shadow p-2 my-2" style="max-height:46vh;overflow-y:auto">
                                <?php 
                                    $id = $rowwebdev['reqid1'];
                                    $sqlmsg = "select * from msg where id='$id'";
                                    $resultmsg = mysqli_query($conn,$sqlmsg);
                                    $rowmsg = mysqli_fetch_array($resultmsg);
                                    $reply = explode("^",$rowmsg['msg']);
                                    $count = count($reply);
                                    for($i=1;$i<$count;$i++){ 
                                    $msg = explode("`",$reply[$i]);
                                    $compare = explode("|",$msg[1]);    
                                    if($compare[0]==$name){$float='text-right';$color='#b4e058';}else{$float='text-left';$color='#ece7df';}    
                                ?>   
                                    <p class="<?= $float ?>"><span title="<?= $msg[1] ?>" style="padding:10px;border-radius:10px;background-color:<?= $color ?>;display:inline-block"><?= $msg[0] ?></span></p>
                                    <!-- <span class="text-right font-italic font-weight-bold" style="font-size:x-small"><?= $msg[1] ?></span> -->
                                <?php    } ?>
                                </div>        
                                <div class="card shadow p-2 my-2">
                                <form id="wdmsgform">
                                <div class="row">    
                                    <div class="col-8"><input type="text" autocomplete="off" name="msg" class="form-control" required=""></div>
                                    <div class="col-2"><label><input type="checkbox" name="pending" value="None">No Reply Required</label></div>
                                    <div class="col"><button type="submit" class="btn bg-primary text-white float-right">Send</button></div>
                                </div>    
                                <input type="text" class="d-none" name="id" value="<?= $rowwebdev['reqid1'] ?>">
                                </form>
                                </div>
                            </div> 
                        </div>    
                    <?php }
                    else{ ?>
            <div class="container col-md-6">      
                <form id="wdreq">
                    <lable>Plan:<?= $plan[0] ?></lable>
                    <select id="typereq" onchange="typereqfun()" required name="typereq" class="form-control my-2">
                        <option disabled selected>Type of Site</option>
                        <option>Blog</option>
                        <option>CRM</option>
                        <option>Startup Business</option>
                        <option>Personel page</option>
                        <option>Landing page</option>
                        <option>E-commerce site</option>
                        <option>IT Business site services</option>
                        <option>Ticketing or Support system</option>
                        <option>Back End Operations</option>
                        <option>Other</option>
                    </select>
                    <input class="form-control my-2" type="text" name="purp" placeholder="Purpose of site: ">
                    <select id="nopg" onchange="nopgreq()" name="nopg" class="form-control ">
                        <option selected disabled>No of pages:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>Many</option>
                    </select>
                    <input class="form-control my-2" type="text" required name="purl" placeholder="List Your Products separating by ,">
                    <input class="form-control my-2" type="text" required name="description" placeholder="Describe your site: ">
                    <label>Mobile friendly site: </label>
                    <input type="radio" required name="mf" value="Yes">Yes
                    <input type="radio" required name="mf" value="No">No<br>
                    <label>Give a logo: </label>
                    <input type="radio" required name="logoup" value="Yes" onclick="showbrowse()">Yes
                    <input type="radio" required name="logoup" value="No" onclick="showbrowse()">No
                    <span data-title="If you wish us to design the logo please visit : ">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </span><br>
                    <div class="custom-file mb-3 my-3 w-50 dnone" id="logoupbtn">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>   
                    <label>Upload Specific Images to be on site: </label><br>
                    <div class="custom-file mb-3 my-3 w-50">
                        <input class="custom-file-input" type="file" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> <br> 
                    <button class="btn bg-primary text-white" type="submit">SUBMIT</button>
                </form> 
            </div>    
                <?php } ?>  
              </div>
          </div>
          <?php }?> 
        
        </div>        
    </section>
    <?php } ?>          
         
<div id='wait' style='display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;'><img src='images/demo_wait.gif' width='64' height='64' /><br>Loading..</div>
</body> 
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> 
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function cotyreqfun(){
		var cotyreq=document.getElementById('cotype').value;
		
		if(cotyreq=='Daily'){ 
              var dlf=document.getElementById('dailyinfo').style.display='inline';
              var wef=document.getElementById('weekendinfo').style.display='none';
              var crf=document.getElementById('crashinfo').style.display='none';
		}
		else if(cotyreq=='Week End'){
              var dlf=document.getElementById('dailyinfo').style.display='none';
              var wef=document.getElementById('weekendinfo').style.display='inline';
              var crf=document.getElementById('crashinfo').style.display='none';
       }
		else if(cotyreq=='Crash Course'){
              var dlf=document.getElementById('dailyinfo').style.display='none';
              var wef=document.getElementById('weekendinfo').style.display='none';
              var crf=document.getElementById('crashinfo').style.display='inline';
       }
		
		else{
              var dlf=document.getElementById('dailyinfo').style.display='none';
              var wef=document.getElementById('weekendinfo').style.display='none';
              var crf=document.getElementById('crashinfo').style.display='none';
		    }
    }   
    $('#startdate').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mmm-yyyy'
    });   
    $('#enddate').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mmm-yyyy'
    }); 
		function domainreqfun(){
		var domainreq=document.getElementById('domainreq').value;
		
		if(domainreq=='Yes'){
			
			var cgr=document.getElementById('yes').style.display='block';
			var cgn=document.getElementById('yes').name='role';
			var sur=document.getElementById('buttons').style.display='block';
			
			var otr=document.getElementById('prdom').style.display='none';
			var otn=document.getElementById('prdom').name='role1';
			var whr=document.getElementById('prsdom').style.display='none';
			var whn=document.getElementById('prsdom').name='role1';
			var wdr=document.getElementById('select').style.display='none';
			var wdn=document.getElementById('select').name='role1';
			
		}
		else if(domainreq=='No'){
			var wdr=document.getElementById('select').style.display='block';
			var wdn=document.getElementById('select').name='role';
			var sur=document.getElementById('buttons').style.display='block';
			var sun=document.getElementById('buttons').name='role';
			var cgr=document.getElementById('yes').style.display='none';
			var cgn=document.getElementById('yes').name='role1';
			var otr=document.getElementById('prdom').style.display='none';
			var otn=document.getElementById('prdom').name='role1';
			var whr=document.getElementById('prsdom').style.display='none';
			var whn=document.getElementById('prsdom').name='role1';
		}

		else if(domainreq=='Netgigs Sub Domain'){
			var whr=document.getElementById('prsdom').style.display='block';
			var whn=document.getElementById('prsdom').name='role';
			var sur=document.getElementById('buttons').style.display='block';
			var sun=document.getElementById('buttons').name='role';
			var otr=document.getElementById('prdom').style.display='none';
			var otn=document.getElementById('prdom').name='role1';
			var cgr=document.getElementById('yes').style.display='none';
			var cgn=document.getElementById('yes').name='role1';
			var wdr=document.getElementById('select').style.display='none';
			var wdn=document.getElementById('select').name='role1';
		}
		else{
			alert('Please select Domain status');
			var wdr=document.getElementById('select').style.display='none';
			var cgr=document.getElementById('yes').style.display='none';
			var whr=document.getElementById('prsdom').style.display='none';
			var otr=document.getElementById('prdom').style.display='none';
			var sur=document.getElementById('buttons').style.display='none';

}
}
		function domainpurfun(){
			
		var selected = $('input[name=dpur]:checked').val();
		if(selected=='I will get'){
			var otr=document.getElementById('prdom').style.display='none';
			alert('Make sure you purchase a valid FQDN from registered domain vendor');
	    }
		else{
			
			var otr=document.getElementById('prdom').style.display='block';
			var otn=document.getElementById('prdom').name='role';
			
	    }
		}
	
	      function canclebutton(){
                document.getElementById('name').disabled = true;
                document.getElementById('address').disabled = true;
                document.getElementById('update').disabled = true;
                document.getElementById('email').disabled = true;
                document.getElementById('password').disabled = true;
                document.getElementById('confirm_password').disabled = true;
                document.getElementById('cancle').disabled = true;
                document.getElementById('edit').disabled = false;
                }
                        $(document).ready(function(){
                                      $('#fillrequirement').on('submit', function(e){
                                        e.preventDefault();
                                        var formData = $(this).serialize();
                                        $.ajax({
                                        type: 'POST',
                                        url: 'web_hos.php',
                                        data: formData,
                                        success: function(response) {
                                          alert(response)
                                       // $('#result').html(response);
                                        }
                                        });
                                        });
                        });	
    function showbrowse(){
        var selected = $('input[name=logoup]:checked').val();
		if(selected=='No'){
			var otr=document.getElementById('logoupbtn').style.display='none';
	    }
		else{
			var otr=document.getElementById('logoupbtn').style.display='block';
			var otn=document.getElementById('prdom').name='role';
        }
    }
//Navbar sticky start 
    window.onscroll = function() {myFunction()};
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
//Navbar sticky end
                  $(document).ready(function(){
                    $('#cgreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                        type: 'POST',
                        url: 'cg.php',
                        data: formData,
                    	  success: function(response) {
                        alert(response)
                        // $('#result').html(response);
			                   },
			                     cache: false,
		                       contentType: false,	
			                     processData: false
                         });
                         });
                      $('#otreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'ot.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
                      $('#whreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'web_hos.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
                      $('#wdreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'web_dev.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
                      $('#wdesreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'web_des.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
                      $('#ldreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'l_des.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
                      
                      $('#adreq').on('submit', function(e){
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.ajax({
                        type: 'POST',
                        url: 'app_dev.php',
                        data: formData,
                        success: function(response) {
                          alert(response)
                       // $('#result').html(response);
                        }
                        });
                        });
//req func end
//msg func                              
                       $("#cgmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                        });     
                       $("#otmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });     
                       $("#whmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });     
                       $("#wdmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
                       $("#wdesmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });

                       $("#ldmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
                       $("#adevmsgform").on('submit', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'msg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                alert(response)
                                //$("#result").html(response);
                                window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
//msg functions end
// Tabs functions
                       $("#inprogress-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'inprogress.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#inpresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });      
                       $("#inputneeded-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'inputneeded.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#inpnresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
                       $("#solved-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'solved.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#solvedresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });      
                             
                       $("#rejected-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'rejected.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            },   
                            success: function(response) {
                                //alert(response)
                                $("#rejectedresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       }); 
                        //$('#myTab a:first').addClass('active');
                        //$('#myTabContent div:first').addClass('active');
                });
	</script>    
</html>