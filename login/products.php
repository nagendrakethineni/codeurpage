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
          <li class='nav-item'>
            <a class='nav-link' href='subscriptions.php' tabindex='-1' aria-disabled='true'>Subscriptions</a>
          </li>
          <li class='nav-item active'>
            <a class="nav-link" href="products.php">Products</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container" id="submitted">
        <h4 class="my-4">You have the following subscriptions</h4>
                <table class="table">
                    <tr><th>Product</th><th>Plan</th></tr>
                    <?php 
                    if(strpos($row['product'], 'Guidance') == true){ ?>
                        <tr><td>Career Guidance</td><td><?= $plan[0] ?></td></tr>
                   <?php } 
                    if(strpos($row['product'], 'Training') == true){ ?>
                        <tr><td>Online Training</td><td><?= $plan[1] ?></td></tr>
                   <?php }  
                    if(strpos($row['product'], 'Hosting') == true){ ?>
                        <tr><td>Web Hosting</td><td><?= $plan[2] ?></td></tr>
                   <?php }  
                    if(strpos($row['product'], 'Develop') == true){ ?>
                        <tr><td>Web Development</td><td><?= $plan[3] ?></td></tr>
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
                        if(strpos($row['product'], 'Guidance') == true){ ?>
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
                        if(strpos($row['product'], 'Online') == true){ ?>
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
                        if(strpos($row['product'], 'Hosting') == true){ ?>
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
                        if(strpos($row['product'], 'Develop') == true){ ?>
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
<script>
    <?php 
        if(array_key_exists(0, $plan)){
        if($plan[0] == 'pro'){ 
    ?>
		                document.getElementById('cgpo').selected = 'selected';
	<?php } }
        if(array_key_exists(0, $plan)){
        if($plan[0] == 'premium'){ ?>
                        document.getElementById('cgpr').selected = 'selected';
    <?php 	}}
        if(array_key_exists(0, $plan)){	
        if($plan[0] == 'basic'){ ?>
                        document.getElementById('cgba').selected = 'selected';
    <?php 	}}
        if(array_key_exists(1, $plan)){
        if($plan[1] == 'pro'){ ?>
                        document.getElementById('otpo').selected = 'selected';
    <?php    }}
        if(array_key_exists(1, $plan)){
        if($plan[1] == 'premium'){ ?>
                        document.getElementById('otpr').selected = 'selected';
    <?php 	}}
        if(array_key_exists(1, $plan)){	
        if($plan[1] == 'basic'){ ?>
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
        if(array_key_exists(3, $plan)){
        if($plan[3] == 'pro'){ ?>
                        document.getElementById('wdpo').selected = 'selected';
      <?php   }}
        if(array_key_exists(3, $plan)){
        if($plan[3] == 'premium'){ ?>
                        document.getElementById('wdpr').selected = 'selected';
    <?php }} 
        if(array_key_exists(3, $plan)){
        if($plan[3] == 'basic'){ ?>
                        document.getElementById('wdba').selected = 'selected';
    <?php }}?>
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
//				alert(response)
				$('#result').html(response);
				},
				cache: false,
				contentType: false,
				processData: false
			    });
			 });
    });
</script> 
</body>    
<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>    

</html>