<?php
if(!isset($_COOKIE['evusername'])){
   die(header("location:index.php"));
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>Events View</title>

    <!-- Bootstrap CDN commands -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
      <!-- Compiled and minified materialize CSS CDN commands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--materialize CSS icons-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--including Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<style>
/*enable for testing purpose
*{
box-shadow:1px 0px 3px orange;
}*/

@font-face {
 font-family: SourceSansPro-Bold;
  src: url('vendor/fonts/source-sans-pro/SourceSansPro-Bold.ttf');
}
@font-face {
 font-family: SourceSansPro-SemiBold;
  src: url('vendor/fonts/source-sans-pro/SourceSansPro-SemiBold.ttf');
}
@font-face {
 font-family: SourceSansPro-Regular;
  src: url('vendor/fonts/source-sans-pro/SourceSansPro-Regular.ttf');
}
@media only screen and (orientation: landscape){

.two{
display: flex;
}
.one{
width:50%;
padding:5px;
}
.card-panel{
padding-top:14px;
padding-bottom:14px;
}

}
.fr,button{font-family: SourceSansPro-Regular;}
.fsb{font-family: SourceSansPro-SemiBold;}
.fb{font-family: SourceSansPro-Bold;}

#ru{
position:relative;
}
#delacc{
position:absolute;
right:0px;
color:grey;
}
</style>
</head>
<body style="word-break: break-all;"> 
<nav class="nav-extended blue">
    <div class="nav-wrapper">
      <a style="text-decoration:none;" class="brand-logo fb"> <i class="material-icons">event_note</i>Event'z</a>
      <a href="#menu" data-target="mobile-sidenav" class="sidenav-trigger" style="text-decoration:none;"><i class="material-icons">menu</i></a>
 
        <ul id="nav-mobile" class="right hide-on-med-and-down">
    <li class="nav-item"> <a class="nav-link" href="nestle.php"><i class="material-icons">person_add</i>Register</a> </li> 
     <li> <a class="log" href="index.php" class="blue-text">Sign Out</a> </li>
      </ul>
 
     </nav>

  <ul class="sidenav" id="mobile-sidenav">
    <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
<h6 class="white-text fb" ><?php echo $_COOKIE['evusername']; ?></h6>  
     <div id="ru" class="row fr"> <p><a class="log" href="index.php" class="blue-text">Sign Out</a> </p>  <p id="delacc">Delete Account</p>
</div>
 </div>
 <li class="nav-item fr"> <a class="nav-link" href="nestle.php"><i class="material-icons">person_add</i>Register</a> </li> 
 <form action="eclairs.php" method="GET">
<ul class="collection"> <li class="collection-header fsb"><h5>SIG <?php echo $_COOKIE['evsig']; ?> Members</h5></li>
 <span id="grp">
 
 
 <span>
  </ul></form>
  </ul>
<!--  -->
<br> <div id="content" class="container">




</div><!--container-->
<!--  -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<script>
$(document).ready(function(){
function card(data){
  //$("#content").html(data);
}
var c ="<?php echo htmlentities(stripslashes(trim($_GET['user']))); ?>";
if(c){
var n={unm:c,ae:"viw"}
}else{
var n={ae:"viw"}
}

 $.ajax({
    type: "POST",
    url: 'cadbaury.php', 
    data:n,
    success: function(data){
    //card(data);
$("#content").html(data);
    }//suc 
    });//aj

$(".log").click(function(){
 $.ajax({
    type: "POST",
    url: 'cadbaury.php', 
    data:{ae:"lgt"}
    });//aj
});//clk

$("#delacc").click(function(){
 $.ajax({
    type: "POST",
    url: 'cadbaury.php',
    data:{ae:"delacc"},
    success: function(data){ 
    window.location="index.php";
    }//suc 
    });//aj
});//cl


 $.ajax({
    type: "POST",
    url: 'cadbaury.php', 
    data:{ae:"grp"},
    success: function(data){
  $("#grp").html(data);
    }//suc 
    });//aj

});//doc
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
      <script src="js/bootstrap.min.js"></script>
 
  <!--side nav activation-->
 <script> document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
  });
</script>
 
</body>
</html>
