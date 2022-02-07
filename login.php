<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>PinAutomator - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
           <form id='userForm' method="post">
           	<div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                        placeholder="Username Pinterest">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                        placeholder="Email Pinterest">
                    </div>
                   
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword"  name="password" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</a>
                    </div>
                    
                    <div id='response'></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
$('#userForm').submit(function(){

// show that something is loading
$('#response').html("<b>Loading response...</b>");

$.ajax({
type: 'POST',
url: 'auth.php',
data: $(this).serialize() // getting filed value in serialize form
})
.done(function(data){ // if getting done then call.

// show the response
$('#response').html(data);

})
.fail(function() { // if fail then getting message

// just in case posting your form failed
alert( "Posting failed." );

});

// to prevent refreshing the whole page page
return false;

});
});
</script>

                  </form>
                 
                  
                </div>
              </div>
            </div>
          
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>