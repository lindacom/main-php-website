<?php 
 // displays errors in the page for testing purposes
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php include 'dbConnect.php';?> 

 <?php include 'loginuser.php';?> 

<!-- n.b. shopping nav removed as it contains an active session -->

<?php include '../books/includes/db_connect.php';?>
<?php include '../books/Foundationphp/Sessions/MysqlSessionHandler.php';?>

  <?php
// Storing session data in the database using the session handler php file, session handler class and PDO db connection
// Warning: session_set_save_handler(): Cannot change save handler when session is active
// therefore this code needs to appear before session start

use Foundationphp\Sessions\MysqlSessionHandler;


$handler = new MysqlSessionHandler($db);
session_set_save_handler($handler);

?> 
<?php
session_start();
?> 
<!DOCTYPE html>

<html lang="en">

<head>
  
<title>Login and sign up form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.reveal.min.js"></script> <!-- used by the modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.core.min.js"></script> <!-- used by the modal -->
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.util.keyboard.min.js"></script> <!-- used by the modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.util.touch.min.js"></script> <!-- used by the modal -->
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.util.triggers.min.js"></script> <!-- used by the modal -->
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.util.mediaQuery.min.js"></script> <!-- used by the modal -->
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.1/js/plugins/foundation.util.motion.min.js"></script> <!-- used by the modal -->
</head>
 
 
  <body>
        

        <!-- TWO COLUMN FORMAT -->
       
      <div class="grid-container">
  <div class="grid-x grid-margin-x" style="background-color:#F5CB5C;margin: 20 auto; padding:20px;">

                     <!-- Left -->
      <div class="cell small-6">


                                <!-- login form -->


		          <h2>Login</h2>
		    		<p> Log in to purchase books. Nb if your account has expired you will not be able to log in</p> 
		      
		    
        <div>
       
       <form role="form" method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="loginform">
<div class="loginsignup">
                     <label for="right-label" class="text-left"><strong>Username:</strong></label> </div> 
 
 <div>
                  <input type="text" id="tbusername" name="txtuser" value="<?php echo $username;?>" placeholder="Username*">
                  <span class="error">* <?php echo $usernameErr;?></span>
    </div>  
      

<div>
                 <label for="right-label" class="text-left"><strong>Password:</strong></label></div>
                                           
    <div>
            <input type="password" id="tbpassword" name="txtpass" value="<?php echo $password;?>" placeholder="Password*">
               <span class="error">* <?php echo $passwordErr;?></span>
</div>

                                                                                                               
  
             <button class="button expanded" type="submit" name="Login" id="btn">Login</button>

     </form> 
     </div>                                                                                                       
                                                                                                               
<br>



<!-- forgotten login modal -->


<div class="pull-left message" id="login-message"></div>

           <p>Forgot <a id="forgot-password" href="#" data-open="passwordModal">Password?</a></p><br>
  
       
           
        <div class="reveal" id="passwordModal" data-reveal>
  <h1>Awesome. I Have It.</h1>
  <p class="lead">Your couch. It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
 
</div>
      
</div> 

<!-- right column -->
		
	<div class="cell small-6">
 <!-- signup form -->

         <h2>Signup</h2>
		    		<p> Sign up to purchase books.</p> 
		      
		    
        <div>
       
       <form role="form" method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="signupform">
<div class="loginsignup">
                     <label for="right-label" class="text-left"><strong>Username:</strong></label> </div> 
 
 <div>
                  <input type="text" id="tbususername" name="txtsuuser" value="<?php echo $username;?>" placeholder="Username*">
                  <span class="error">* <?php echo $usernameErr;?></span>
    </div>  
      
<div>
                 <label for="right-label" class="text-left"><strong>Email:</strong></label></div>
                                           
    <div>
            <input type="text" id="tbsuemail" name="txtsuemail" placeholder="Email*">
               
</div>

<div>
                 <label for="right-label" class="text-left"><strong>Password:</strong></label></div>
                                           
    <div>
            <input type="password" id="tbsupassword" name="txtsupass" value="<?php echo $password;?>" placeholder="Password*">
               <span class="error">* <?php echo $passwordErr;?></span>
</div>

                                                                                                               
  
             <button class="button expanded" type="submit" name="Signup" id="btn">Signup</button>

     </form> 
     </div> 
  
         
            
      </div> <!-- end of row -->
       
  </div> <!-- end of wrapper-->

  <!-- updated code to use more secure prepared statement - signup connection to database and insert post values -->
   <?php

  if(isset($_POST["Signup"]))
{
   
  //  email validation
  // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
  
  //  if($email) {
//use prepared statement to register new user
    $sql = "INSERT INTO tbl_customer (CustomerName, email, password, expiry)
                              VALUES (?, ?, ?, ?)";

    $stmt = $connect->prepare($sql);

    $stmt->bind_param("ssss", $customername, $email, $pwd, $expiry);

// set parameters and execute
$customername = $_POST["txtsuuser"];
 $email = $_POST["txtsuemail"];
$pwd = password_hash($_POST["txtsupass"], PASSWORD_DEFAULT);
$expiry = (new DateTime('last day of this month + 12 months'))->format('Y-m-d');
$stmt->execute();

echo "Account created successfully. Your account will expire on:" ;
   // } else {
     //   echo "invalid email";
    //    }
}
//check for error message
/*$error = $stmt->errorInfo()[2];
if ($error) {
    echo $error;
}*/

/*echo '<pre>';
$stmt->debugDumpParams();
echo '</pre>';
}*/


?>
 

     <!-- old code - signup connection to database and insert post values -->

      <!--  <?php

  if(isset($_POST['Signup']))
{
  

    $sign = "INSERT INTO tbl_customer (CustomerName, email, password)
    VALUES ('".$_POST["txtsuuser"]."','".$_POST["txtsuemail"]."','".$_POST["txtsupassword"]."')";

    $resulty = mysqli_query($connect,$sign);

    if($resulty) {
        echo 'user account created please sign in';
    }
    
}

?> -->
    
       <!-- change signup input to lowercase --> 
      
     <script>
function lowercaseFunction() {
  var x = document.getElementById("tbsuusername");
  x.value = x.value.toLowerCase();

var y = document.getElementById("tbsuemail");
y.value = y.value.toLowerCase();

var z = document.getElementById("tbsupassword");
z.value = z.value.toLowerCase();
}
</script> 

<script>
$(document).foundation();

/*
  Switch actions
*/
$('.unmask').on('click', function(){

  if($(this).prev('input').attr('type') == 'password')
    changeType($(this).prev('input'), 'text');

  else
    changeType($(this).prev('input'), 'password');

  return false;
});

function changeType(x, type) {
  if(x.prop('type') == type)
  return x; //That was easy.
  try {
    return x.prop('type', type); //Stupid IE security will not allow this
  } catch(e) {
    //Try re-creating the element (yep... this sucks)
    //jQuery has no html() method for the element, so we have to put into a div first
    var html = $("<div>").append(x.clone()).html();
    var regex = /type=(\")?([^\"\s]+)(\")?/; //matches type=text or type="text"
    //If no match, we add the type attribute to the end; otherwise, we replace
    var tmp = $(html.match(regex) == null ?
      html.replace(">", ' type="' + type + '">') :
      html.replace(regex, 'type="' + type + '"') );
    //Copy data from old element
    tmp.data('type', x.data('type') );
    var events = x.data('events');
    var cb = function(events) {
      return function() {
            //Bind all prior events
            for(i in events)
            {
              var y = events[i];
              for(j in y)
                tmp.bind(i, y[j].handler);
            }
          }
        }(events);
        x.replaceWith(tmp);
    setTimeout(cb, 10); //Wait a bit to call function
    return tmp;
  }
}


</script>


<!-- forgotten password 

<script>
$("#forgot-password").click(function(){
    $("#forgot-password-modal").modal();
});
</script> -->









      <script>
   $(document).ready(function() {
      $(document).foundation();
   })
</script>

</body>
</html>
