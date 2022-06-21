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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <title><?= $row['name'] ?></title>
</head>
<body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
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
          <li class='nav-item'>
            <a class='nav-link' href='requirements.php'>Requirement</a>
          </li>
          <li class='nav-item active'>
            <a class='nav-link' href='subscriptions.php' tabindex='-1' aria-disabled='true'>Subscriptions</a>
          </li>
          <li class='nav-item'>
            <a class="nav-link" href="products.php" >Products</a>
          </li>
        </ul>
      </div>
    </nav>
<?php 
        if($row['admin'] =='ADMIN'){ ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      
      <li class="nav-item">
        <a class="nav-link active" id="smarthealth-tab" data-toggle="tab" href="#smarthealth" role="tab" aria-controls="#smarthealth" aria-selected="false">Smart Health</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="webdev-tab" data-toggle="tab" href="#wd" role="tab" aria-controls="#wd" aria-selected="false"> Web Development</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="ad-tab" data-toggle="tab" href="#ad" role="tab" aria-controls="#ad" aria-selected="false"> App Development</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="wdes-tab" data-toggle="tab" href="#wdes" role="tab" aria-controls="#wdes" aria-selected="false"> Web Designing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="ldes-tab" data-toggle="tab" href="#ldes" role="tab" aria-controls="#ldes" aria-selected="false"> Logo Designing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="hos-tab" data-toggle="tab" href="#hos" role="tab" aria-controls="#hos" aria-selected="false"> Hosting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="cg-tab" data-toggle="tab" href="#cg" role="tab" aria-controls="#cg" aria-selected="false"> Carrer Guidence</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="ot-tab" data-toggle="tab" href="#ot" role="tab" aria-controls="#ot" aria-selected="false"> Online training</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active p-3" id="smarthealth" role="tabpanel" aria-labelledby="smarthealth-tab">
      </div>
           
      
      <div class="tab-pane fade p-3" id="wd" role="tabpanel" aria-labelledby="webdev-tab">
        <div id="wdevresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="ad" role="tabpanel" aria-labelledby="ad-tab">
         <div id="adresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="wdes" role="tabpanel" aria-labelledby="wdes-tab">
         <div id="wdesresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="ldes" role="tabpanel" aria-labelledby="ldes-tab">
         <div id="ldesresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="hos" role="tabpanel" aria-labelledby="hos-tab">
         <div id="hosresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="cg" role="tabpanel" aria-labelledby="cg-tab">
         <div id="cgresult"></div>
      </div>
      <div class="tab-pane fade p-3" id="ot" role="tabpanel" aria-labelledby="ot-tab">
         <div id="otresult"></div>
      </div>
   </div>
<?php   } 
// client     
else { ?> 
    
    <div class="tab-content" id="submitted">
        <h4 class="my-4">You have the following subscriptions</h4>
                <table class="table">
                    <tr><th>Product</th><th>Plan</th></tr>
                    <?php 
                    if(strpos($row['product'], 'Guidance') !== false){ ?>
                        <tr><td>Career Guidance</td><td><?= $plan[5] ?></td></tr>
                   <?php } 
                    if(strpos($row['product'], 'Training') !== false){ ?>
                        <tr><td>Online Training</td><td><?= $plan[6] ?></td></tr>
                   <?php }  
                    if(strpos($row['product'], 'Hosting') !== false){ ?>
                        <tr><td>Web Hosting</td><td><?= $plan[2] ?></td></tr>
                   <?php }  
                    if(strpos($row['product'], 'Develop') !== false){ ?>
                        <tr><td>Web Development</td><td><?= $plan[0] ?></td></tr>
                   <?php } 
                   if(strpos($row['product'], 'Web Design') !== false){ ?>
                        <tr><td>Web Design</td><td><?= $plan[1] ?></td></tr>
                   <?php }
                   if(strpos($row['product'], 'App Dev') !== false){ ?>
                        <tr><td>App Development</td><td><?= $plan[3] ?></td></tr>
                   <?php } 
                   if(strpos($row['product'], 'Logo Des') !== false){ ?>
                        <tr><td>Logo Design</td><td><?= $plan[4] ?></td></tr>
                   <?php } ?> 
                    <tr><th><button type="button" class="btn bg-primary text-white" onclick="showaddproductdiv()">EDIT</button></th><td></td></tr>
                </table> 
    </div>
    <div class="container dnone" id="addproductdiv">
        <h4 class="my-4">Add Products</h4>
        <form id="addproduct">
            <table class="table">
                <tr><th>Product</th><th>Plan</th></tr>
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Guidance') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='cgcb' value="Career Guidance" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='cgcb' value="Career Guidance">
                        <?php } ?>
                        <lable>Career Guidance</lable>
                    </td>
                    <td>
                        <select id='cgpl' name='cgpl'>
                            <option value='basic' id='cgba'>BASIC</option>
                            <option value='pro' id='cgpo'>PRO</option>
                            <option value='premium' id='cgpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Online') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='otcb' value="Online Training" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='otcb' value="Online Training">
                        <?php } ?>
                        <lable>Online Training</lable>
                    </td>
                    <td>
                        <select id='otpl' name='otpl'>
                            <option value='basic' id='otba'>BASIC</option>
                            <option value='pro' id='otpo'>PRO</option>
                            <option value='premium' id='otpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Hosting') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='whcb' value="Web Hosting" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='whcb' value="Web Hosting">
                        <?php } ?>
                        <lable>Web Hosting</lable>
                    </td>
                    <td>
                        <select id='whpl' name='whpl'>
                            <option value='basic' id='whba'>BASIC</option>
                            <option value='pro' id='whpo'>PRO</option>
                            <option value='premium' id='whpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Develop') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='wdcb' value="Web Development" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='wdcb' value="Web Development">
                        <?php } ?>
                        <lable>Web Development</lable>
                    </td>
                    <td>
                        <select id='wdpl' name='wdpl'>
                            <option value='basic' id='wdba'>BASIC</option>
                            <option value='pro' id='wdpo'>PRO</option>
                            <option value='premium' id='wdpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'App Dev') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='adcb' value="App Development" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='adcb' value="App Development">
                        <?php } ?>
                        <lable>App Development</lable>
                    </td>
                    <td>
                        <select id='adpl' name='adpl'>
                            <option value='basic' id='adba'>BASIC</option>
                            <option value='pro' id='adpo'>PRO</option>
                            <option value='premium' id='adpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Logo Design') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='ldcb' value="Logo Design" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='ldcb' value="Logo Design">
                        <?php } ?>
                        <lable>Logo Design</lable>
                    </td>
                    <td>
                        <select id='ldpl' name='ldpl'>
                            <option value='basic' id='ldba'>BASIC</option>
                            <option value='pro' id='ldpo'>PRO</option>
                            <option value='premium' id='ldpr'>PREMIUM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if(strpos($row['product'], 'Web Design') !== false){ ?>
                        <i class="fa fa-check-square-o"></i>
                        <input type="checkbox" name='wdescb' value="Web Design" checked class="dnone">
                        <?php } 
                        else { ?>
                        <input type="checkbox" name='wdescb' value="Web Design">
                        <?php } ?>
                        <lable>Web Design</lable>
                    </td>
                    <td>
                        <select id='wdespl' name='wdespl'>
                            <option value='basic' id='wdesba'>BASIC</option>
                            <option value='pro' id='wdespo'>PRO</option>
                            <option value='premium' id='wdespr'>PREMIUM</option>
                        </select>
                    </td>
                </tr>
                <div id="alertdiv" class="alert alert-success d-none" role="alert">
                    <span id="result"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <tr><td><button type="button" class="btn bg-primary text-white" onclick="hideaddproductdiv()">CANCLE</button><button type="submit" class="btn bg-primary text-white mx-2">SAVE</button></td><td></td></tr>
            </table>    
        </form>
    </div>
<?php } ?>   
<script>
    <?php 
        if(array_key_exists(5, $plan)){
        if($plan[5] == 'pro'){ 
    ?>
		                document.getElementById('cgpo').selected = 'selected';
	<?php } }
        if(array_key_exists(5, $plan)){
        if($plan[5] == 'premium'){ ?>
                        document.getElementById('cgpr').selected = 'selected';
    <?php 	}}
        if(array_key_exists(5, $plan)){	
        if($plan[5] == 'basic'){ ?>
                        document.getElementById('cgba').selected = 'selected';
    <?php 	}}
        if(array_key_exists(6, $plan)){
        if($plan[6] == 'pro'){ ?>
                        document.getElementById('otpo').selected = 'selected';
    <?php    }}
        if(array_key_exists(6, $plan)){
        if($plan[6] == 'premium'){ ?>
                        document.getElementById('otpr').selected = 'selected';
    <?php 	}}
        if(array_key_exists(6, $plan)){	
        if($plan[6] == 'basic'){ ?>
                        document.getElementById('otba').selected = 'selected';
     <?php    }}
        if(array_key_exists(2, $plan)){
        if($plan[2] == 'pro'){ ?>
                        document.getElementById('whpo').selected = 'selected';
     <?php    }}
        if(array_key_exists(2, $plan)){
        if($plan[2] == 'premium'){ ?>
                        document.getElementById('whpr').selected = 'selected';
     <?php 	 }}	
        if(array_key_exists(2, $plan)){
        if($plan[2] == 'basic'){ ?>
                        document.getElementById('whba').selected = 'selected';
     <?php     }}
        if(array_key_exists(0, $plan)){
        if($plan[0] == 'pro'){ ?>
                        document.getElementById('wdpo').selected = 'selected';
      <?php   }}
        if(array_key_exists(0, $plan)){
        if($plan[0] == 'premium'){ ?>
                        document.getElementById('wdpr').selected = 'selected';
    <?php }} 
        if(array_key_exists(0, $plan)){
        if($plan[0] == 'basic'){ ?>
                        document.getElementById('wdba').selected = 'selected';
    <?php }}
    if(array_key_exists(1, $plan)){
        if($plan[1] == 'pro'){ ?>
                        document.getElementById('wdespo').selected = 'selected';
      <?php   }}
        if(array_key_exists(1, $plan)){
        if($plan[1] == 'premium'){ ?>
                        document.getElementById('wdespr').selected = 'selected';
    <?php }} 
        if(array_key_exists(1, $plan)){
        if($plan[1] == 'basic'){ ?>
                        document.getElementById('wdesba').selected = 'selected';
    <?php }}

        if(array_key_exists(4, $plan)){
        if($plan[4] == 'pro'){ ?>
                        document.getElementById('ldpo').selected = 'selected';
    <?php    }}
        if(array_key_exists(4, $plan)){
        if($plan[4] == 'premium'){ ?>
                        document.getElementById('ldpr').selected = 'selected';
    <?php   }}
        if(array_key_exists(4, $plan)){ 
        if($plan[4] == 'basic'){ ?>
                        document.getElementById('ldba').selected = 'selected';
     <?php    }}

        if(array_key_exists(3, $plan)){
        if($plan[3] == 'pro'){ ?>
                        document.getElementById('adpo').selected = 'selected';
    <?php    }}
        if(array_key_exists(3, $plan)){
        if($plan[3] == 'premium'){ ?>
                        document.getElementById('adpr').selected = 'selected';
    <?php   }}
        if(array_key_exists(3, $plan)){ 
        if($plan[3] == 'basic'){ ?>
                        document.getElementById('adba').selected = 'selected';
     <?php    }}?>
    function showaddproductdiv(){
        var sapd = document.getElementById('addproductdiv').style.display="block";
        var ssub = document.getElementById('submitted').style.display="none";
    }
    function hideaddproductdiv(){
        var hapd = document.getElementById('addproductdiv').style.display="none";
        var hsub = document.getElementById('submitted').style.display="block";
    }
    $(document).ready(function(){
			    $('#addproduct').on('submit', function(e){
              $("#alertdiv").removeClass("d-none");    
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
				type: 'POST',
				url: 'addproduct.php',
				data: formData,
				success: function(response) {
				//alert(response)
				$('#result').html(response);
				},
				cache: false,
				contentType: false,
				processData: false
			    });
			 });
    });

    $("#webdev-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subwdev.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#wdevresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
    $("#wdes-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subwebdes.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#wdesresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
    $("#ad-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subad.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#adresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
    $("#ldes-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subldes.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#ldesresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
    $("#hos-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subhos.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#hosresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
     $("#cg-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subcg.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#cgresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });
     $("#ot-tab").on('click', function(e){
                         e.preventDefault();
                        var formData = $(this).serialize();
                           $.ajax({
                            type: 'POST',
                            url: 'subot.php',
                            data: formData,
                            beforeSend: function(){
                             $('#wait').css('display', 'block');   
                            }, 
                            success: function(response) {
                                //alert(response)
                                $("#otresult").html(response);
                            },
                            complete: function(){
                              $('#wait').css('display', 'none'); 
                           }
                        });
                       });

</script>  
</body>    
<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>    

</html>