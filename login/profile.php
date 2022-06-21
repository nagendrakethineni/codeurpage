<?php
include("header.php");
?>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $row['name'] ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="requirements.php">Requirement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="subscriptions.php" tabindex="-1" aria-disabled="true">Subscriptions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
        </ul>
      </div>
    </nav>
    <section>
        <div class="container" id="profilediv">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="userdp/<?= $row['filename'] ?>"  class="img-fluid "/>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr><td>Name</td><td><?= $row['name'] ?></td></tr>
                        <tr><td>Email</td><td><?= $row['email'] ?></td></tr>
                        <tr><td>DOB</td><td><?= $row['dob'] ?></td></tr>
                        <tr><td>Gender</td><td><?= $row['gender'] ?></td></tr>
                        <tr><td>Address</td><td><?= $row['address'] ?></td></tr>
                        <tr>
                            <td><button type="button" class="btn bg-primary text-white" onclick="showupdateform()">EDIT</button></td>
                            <td><button type="button" class="btn bg-primary text-white" onclick="showpasswordform()">Change Password</button></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
        <form id="updateform" class="dnone">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="userdp/<?= $row['filename'] ?>" class="img-fluid"/>
                    <div class="custom-file mb-3 my-3 w-75">
                      <input type="file" class="custom-file-input" id="dp" name="dp" title="Please choose image less than 1 mb">
                      <label class="custom-file-label" for="dp">Choose file</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Name</span>
                        </div>
                        <input class="form-control" type="text" placeholder="Name" name="name" required value="<?= $row['name'] ?>">
                    </div> 
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Email</span>
                        </div>   
                        <input class="form-control" type="email" placeholder="Email" name="email" required readonly value="<?= $row['email'] ?>">
                    </div>    
                    <span class="px-2 my-3">Gender:</span>
                    <span class="px-2">Male</span><input type="radio" name="gender" value="Male" id="male">
                    <span class="px-2">Female</span><input type="radio" name="gender" value="Female" id="female">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">DOB</span>
                        </div>
                        <input id="datepicker" width="270" placeholder="DOB" name="dob" required  value="<?= $row['dob'] ?>"/>
                    </div> 
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Address</span>
                        </div>   
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Address" required><?= $row['address'] ?></textarea>
                    </div>    
                    <button type="button" class="btn bg-primary text-white" onclick="hideupdateform()">CANCLE</button>
                    <button type="submit" class="btn bg-primary text-white">SAVE</button>
                </div>
            </div>
        </div>
        </form>
        <div class="container dnone" id="passworddiv">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="userdp/<?= $row['filename'] ?>"  class="img-fluid"/>
                </div>
                <div class="col-md-8">
                    <form id="passwordform">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Old Password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Enter Old Password" name="opwd" required>
                        </div> 
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">New Password</span>
                        </div>   
                            <input type="password" class="form-control" placeholder="Enter New Password" name="npwd" id="npwd" required>
                        </div>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rep Password</span>
                        </div>    
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpwd" id="cpwd" required onkeyup="confpassword()">
                        </div>    
                        <button type="button" class="btn bg-primary text-white" onclick="hidepasswordform()">CANCLE</button>
                        <button type="submit" class="btn bg-primary text-white">SAVE</button>
                    </form>
                    <div id="pwdresult"></div>
                </div>    
        </div> 
        </div>    
    </section>
</body> 
<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> 
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mmm-yyyy'
    });
    function showupdateform(){
        $('#updateform').show();
        $('#profilediv').hide();
    }
    function hideupdateform(){
        $('#updateform').hide();
        $('#profilediv').show();
    }
    function showpasswordform(){
        $('#passworddiv').show();
        $('#profilediv').hide();
    }
    function hidepasswordform(){
        $('#passworddiv').hide();
        $('#profilediv').show();
    }
    function confpassword(){
       var npwd = document.getElementById('npwd');
       var cpwd = document.getElementById('cpwd');
        if(npwd.value==cpwd.value){
            npwd.style.color = 'green';
            cpwd.style.color = 'green'; 
        }
        else{
            npwd.style.color = 'red';
            cpwd.style.color = 'red';                
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
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    if("<?= $row['gender']?>" == "Male"){var male = document.getElementById('male').checked = true;}
    else{var female = document.getElementById('female').checked = true;}
    $(document).ready(function(){
        $('#updateform').on('submit', function(e){
		e.preventDefault();
	      // var formData = $(this).serialize();
	       var formData = new FormData(this);
               $.ajax({
                type: 'POST',
                url: 'update.php',
                data: formData,
                success: function(response) {
                    alert(response)
		          $('#result').html(response);
                  window.location.href = "profile.php";
		        },
			     cache: false,                    
                 processData: false,
                 contentType: false   
                });
        });
        $('#passwordform').on('submit', function(e){
		e.preventDefault();
	      // var formData = $(this).serialize();
           var npwd = document.getElementById('npwd');
           var cpwd = document.getElementById('cpwd');
            if(npwd.value==cpwd.value){
	       var formData = new FormData(this);
               $.ajax({
                type: 'POST',
                url: 'updatepwd.php',
                data: formData,
                success: function(response) {
                  //  alert(response)
		          $('#pwdresult').html(response);
                 // window.location.href = "profile.php";
		        },
			     cache: false,                    
                 processData: false,
                 contentType: false   
                });
            }else{
                //alert('Passowrd and Confirm Password are wrong');
                $('#pwdresult').html('Passowrd and Confirm Password must be same');
                npwd.style.color = 'red';
                cpwd.style.color = 'red';
            }
        });
  });

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>    
</html>