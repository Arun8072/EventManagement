<?php
  if(isset($_COOKIE['evusername'])){
 header("location:eclairs.php");
     }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $Error="";
      // username and password sent from form 
      if(isset($_POST['eusername'])){
        $user =$_POST['eusername'];
        $pass =$_POST['epassword'];
        $pass=MD5(trim($pass));
      }else{
        $user =" ";
        $pass =" ";
      }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Event";

// Create connection
$conn = new  mysqli($servername, $username, $password,$dbname);

 // Check connection
if ($conn->connect_error) {
   die("Connection failed: "  . $conn->connect_error);
}
   
   $sql = "SELECT username,password,sig FROM Staff";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){
       if($row["username"]==$user){
        if($row["password"]==$pass){
   		if(!isset($_COOKIE['evusername'])){
   	$cookie_name = "evusername";
    $cookie_value = $user;
   	 setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
   $cookie_name = "evsig";
    $cookie_value = $row["sig"];
   	 setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
         }
        $conn->close();
 exit(header("location:eclairs.php"));
       }//p if
       else{
      $Error="Username/Password may be incorrect";
      }
         
     }//u if
      else{
      $Error="Username / Password may be incorrect";
      }		
    }//wh
    }//res
 $conn->close();
   }//post if
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Event Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/main.css">
<!--===============================================================================================-->
<style>
@font-face {
  font-family: SourceSansPro-SemiBold;
  src: url('fonts/source-sans-pro/SourceSansPro-SemiBold.ttf'); 
}
#sig{
width:100%;
border-radius:5px;
}
#tlogin,#ucrt{
width:100px;
border-radius:5px;
  font-family: SourceSansPro-SemiBold;
}
</style>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			
  <ul id="nv" class="nav nav-tabs bg-transparent nav-pills justify-content-center" role="tablist">
    <li class="nav-item">
<a id="tlgn" class="nav-link active" data-toggle="tab" href="#T-login">T-Login</a>
    </li>
   <li class="nav-item">
    <a id="cusr" class="nav-link" data-toggle="tab" href="#C-user">Sign Up</a></li>
  </ul>
  
<span class="tab-content">
    
    <div id="T-login" class="container tab-pane active" style="word-break: break-all;">
 <span class="login100-form-title p-b-37"> Teacher's Login</span>  
<form id="form2" class="login100-form validate-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >  
					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter Username ">
					<input  class="input100" type="text" name="eusername" placeholder="Username">
					<span class="focus-input100"></span>
				</div>              

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter Password">
					<input class="input100" type="password" name="epassword" placeholder="password">
					<span class="focus-input100"></span>
				</div>     
                  


				<div class="container-login100-form-btn">
					<button id="tlogin" type="submit" value="submit" class="btn btn-primary  text-uppercase">
						Login
					</button>
				</div>


							
			</form>
                 <div class="container-login100-form-btn "> 
            <p><?php echo $Error; ?></p>              
			</div>
    			</div>

   <div id="C-user" class="container tab-pane fade" style="word-break: break-all;">
 <span class="login100-form-title p-b-37">Create User</span>
		<form id="form3" class="login100-form validate-form2" method="POST">                      
                                     
							<div  class="wrap-input100 validate-input2 m-b-20" data-validate="Enter Username ">
					<input class="input100" type="text" name="CreateUser" placeholder="Username">
					<span class="focus-input100"></span>
				</div>              

				<div class="wrap-input100 validate-input2 m-b-25" data-validate = "Enter Password">
					<input class="input100" type="password" name="CreatePass" placeholder="password">
<span class="focus-input100"></span>				</div> <br>

<div class="wrap-input100 validate-input2 m-b-25" >
					<input class="input100" type="password" name="unqid" placeholder="Unique Password">
					<span class="focus-input100"></span>
				</div> 
				
<div class="wrap-input100 m-b-25" data-validate = "Select">
 ​<select id="sig" name="sig" class="custom-select">
  <option value="" disabled selected hidden>SIG</option>
  <option value="1">SIG 1</option>
  <option value="2">SIG 2</option>
  <option value="3">SIG 3</option>
  <option value="4">SIG 4</option>
  <option value="5">SIG 5</option>
  <option value="6">SIG 6</option>
  <option value="7">SIG 7</option>
  <option value="8">SIG 8</option>
  <option value="9">SIG 9</option>
  <option value="10">SIG 10</option>
  <option value="11">SIG 11</option>
  <option value="12">SIG 12</option>
  <option value="13">SIG 13</option>
</select>
</div> <br>

<div class="container-login100-form-btn">
		<button id="ucrt" type="submit" value="submit" class=" btn btn-primary text-uppercase cr-al" style="float:left">
						Sign Up
					</button>
				</div>


							
			</form>
<div class="container-login100-form-btn "> 
            <p id="error"></p>              
			</div>
		</div>
</span>
                        

		</div>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/main.js"></script>
<script>
$(document).ready(function() { 
var i=0;
 $(".cr-al").click(function(e){   
   e.preventDefault();
var user =$('[name=CreateUser]').val();
var pass =$('[name=CreatePass]').val();
var id =$('[name=unqid]').val();
var sig =$('[name=sig]').val();
if (user.length>5 && pass.length>5 && id.length==12){

 $.ajax({
    type: "POST",
    url: 'cadbaury.php',
    data:{euser:user,epass:pass,unqid:id,sig:sig,ae:"ucrt"},
    
    success: function(data){
    if (data !=="") {
        $("#error").html(data);
        i++;
        if(i>2){
        window.location="index.php";
       }
     }
    if (data =="") {
    //header location
     $("#tlgn").trigger("click");
     $("input").val("");
       alert("Successfully Created");
     }
    }//suc
    });//aj
    }//if
  });//clk
  
});//doc
</script>
</body>
</html>
