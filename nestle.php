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
 
<style>
/*enable for testing purpose
*{
box-shadow:1px 0px 3px orange;
}*/
@font-face {
 font-family: SourceSansPro-Regular;
  src: url('vendor/fonts/source-sans-pro/SourceSansPro-Regular.ttf');
}
@font-face {
 font-family: SourceSansPro-Bold;
  src: url('vendor/fonts/source-sans-pro/SourceSansPro-Bold.ttf');
}
*,textarea{
font-family: SourceSansPro-Regular;
}
.fb{font-family: SourceSansPro-Bold;}

#ru{
position:relative;
}
#delacc{
position:absolute;
right:0px;
color:grey;
}
form{
background-color:#ffffff;
border-radius:3px;
}
body{
background-color:#123456;
/*background-image:url("images/e.jpg");*/
}

</style>
</head>
<body>
<nav class="nav-extended blue">
    <div class="nav-wrapper">
      <a style="text-decoration:none;" class="brand-logo fb"> <i class="material-icons">event_note</i>Event'z</a>
      <a href="#menu" data-target="mobile-sidenav" class="sidenav-trigger"><i class="material-icons" style="text-decoration:none;">menu</i></a>
 
        <ul id="nav-mobile" class="right hide-on-med-and-down">
 <li class="nav-item active"> <a class="nav-link" href="eclairs.php"><i class="material-icons">developer_board</i>View</a> </li>
 <li> <a class="log" href="index.php" class="blue-text">Sign Out</a> </li>
      </ul><!--navmobile-->
 
     </nav>

  <ul class="sidenav" id="mobile-sidenav">
    <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
<h6 class="white-text fb" ><?php echo $_COOKIE['evusername']; ?></h6>  
     <div id="ru" class="row"> <p><a class="log" href="index.php" class="blue-text">Sign Out</a> </p>  <p id="delacc">Delete Account</p>
</div><!--ru-->
 </div> <!--userview-->
<li class="nav-item"> <a class="nav-link" href="eclairs.php"><i class="material-icons">developer_board</i>View</a> </li> 

  </ul><!--sidenav-->
<!--  -->
 <div class="container">

<form id="fg" class="form-horizontal form-group" role="form" method="POST"  >
<strong><center><h4 id="hd" class="pt-3">Event Details</h4></center></strong>
<div class="row">
<span class="col-1 mt-3"><i class="material-icons">event_note</i></span>
<span class="col-10"> 
<select id="enm" name="event">
<option value="" disabled selected hidden>Select Event</option>
<option value="jnl">Journal</option>
<option value="crs">Course</option>
<option value="ptn">Pattern</option>
<option value="fnd">Funds</option>
<option value="otr">Other</option>
 </select> 
 </span> </div>
 
<!--row-->
<div class="row"> <span class="col-1 mt-3"><i class="material-icons">timer</i></span><span class="col-10"><input id="dtp" type="text" name="date" class="datepicker" placeholder="Select Date" required></span></div><!--row-->

<div id="spf">

</div><!--spf-->

<div class="row ml-4 mr-4"><textarea type="text" name="details" rows="2" class="form-control cnt" placeholder="Add More Details" ></textarea></div><!--row-->

<div class="row "><span class="col-12">
<div class="custom-file"> <input type="file" class="custom-file-input" id="fl" required> <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> </div> </span>
</div>

        <!-- btn-primary -->
<center> <button id="submit" type="submit" class="btn" style="border-radius:5px; width:60%;" value="Submit">Submit</button></center><br>         </form>
 </div><!--con-->
<!--  -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<script>
$(document).ready(function(){

function jnl(){
$("#spf").html("<div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">title</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"topic"+" pattern="+"[A-z\s._]{3,30}"+" title="+"enter only text,count(3-30)"+" placeholder="+"Enter_Topic_Name"+" data-length="+"30"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">class</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"pbl"+" pattern="+"[a-zA-Z\s._]{3,30}"+" title="+"count(3-30)"+" placeholder="+"Enter_Publication_Name"+" data-length="+"30"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">insert_link</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"ref"+" pattern="+"[A-z0-9\s._:/@#?&]{3,50}"+" title="+"count(3-50)"+" placeholder="+"Paste_Reference_Link"+" data-length="+"50"+" required></span></div><!--row-->");
 
}//pbl
function crs(){
$("#spf").html("<div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">title</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"topic"+" pattern="+"[A-z\s._]{3,30}"+" title="+"enter only text,count(3-30)"+" placeholder="+"Enter_Topic_Name"+" data-length="+"30"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">timelapse</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"dur"+" pattern="+"[A-z0-9\s,-_]{3,20}"+" title="+"count(3-20)"+" placeholder="+"Enter_Duration"+" data-length="+"20"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 "+"><i class="+"material-icons"+">signal_wifi_4_bar</i></span><span class="+"row "+"><div class="+"custom-control custom-radio custom-control-inline"+"><input type="+"radio"+" class="+"custom-control-input"+" id="+"r1"+" name="+"type"+" value="+"Online"+"><label class="+"custom-control-label"+" for="+"r1"+">Online Course</label></div><div class="+"custom-control custom-radio custom-control-inline"+"><input type="+"radio"+" class="+"custom-control-input"+" id="+"r2"+" name="+"type"+" value="+"Offline"+"><label class="+"custom-control-label"+" for="+"r2"+">Offline Course</label></div></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 "+"><i class="+"material-icons"+">build</i></span><span class="+"row "+"><div class="+"custom-control custom-radio custom-control-inline"+"><input type="+"radio"+" class="+"custom-control-input"+" id="+"r3"+" name="+"mode"+" value="+"Technical"+"><label class="+"custom-control-label"+" for="+"r3"+">Technical</label></div><div class="+"custom-control custom-radio custom-control-inline ml-4"+"><input type="+"radio"+" class="+"custom-control-input"+" id="+"r4"+" name="+"mode"+" value="+"Non-Technical"+"><label class="+"custom-control-label"+" for="+"r4"+">Non-Technical</label></div></span></div><!--row-->");
}//crs
function ptn(){
$("#spf").html("<div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">title</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"topic"+" pattern="+"[A-z\s._]{3,30}"+" title="+"enter only text,count(3-30)"+" placeholder="+"Enter_Topic_Name"+" data-length="+"30"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">insert_link</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"ref"+" pattern="+"[A-z0-9\s._:/@#?&]{3,50}"+" title="+"count(3-50)"+" placeholder="+"Paste_Reference_Link"+" data-length="+"50"+" required></span></div><!--row-->");
}//ptrn
function fnd(){
$("#spf").html("<div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">person</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"to"+" pattern="+"[A-z\s._]{3,30}"+" title="+"enter only text,count(3-30)"+" placeholder="+"Fund_To_Whom?"+" data-length="+"30"+" required></span></div><!--row--><div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">attach_money</i></span><span class="+"col-10"+"><input type="+"number"+" class="+"form-control form-control cnt"+" name="+"amount"+" pattern="+"[0-9]{3,7}"+" title="+"count(3-7)"+" placeholder="+"Amount"+" data-length="+"7"+" required></span></div><!--row-->");
}//fnd
function otr(){
$("#spf").html("<div class="+"row"+"> <span class="+"col-1 mt-3"+"><i class="+"material-icons"+">insert_link</i></span><span class="+"col-10"+"><input type="+"text"+" class="+"form-control form-control cnt"+" name="+"ref"+" pattern="+"[A-z0-9\s._:/@#?&]{3,50}"+" title="+"count(3-50)"+" placeholder="+"Paste_Reference_Link"+" data-length="+"50"+" required></span></div><!--row-->");
}//otr
$("#enm").change(function(){
switch($(this).val()){
case"jnl": jnl(); break;
case"crs": crs(); break;
case"ptn": ptn(); break;
case"fnd": fnd(); break;
case"otr": otr(); break;
}//sw
});//clk

$("#submit").click(function(e){
e.preventDefault()

switch($("#enm").val()){
case"jnl": 
formData = { 'ae' : $('#enm').val(),'date' : $('input[name=date]').val(), 'topic' : $('input[name=topic]').val(), 'ref' : $('input[name=ref]').val(), 'pbl' : $('input[name=pbl]').val(),'details' : $('textarea[name=details]').val()};
break;
case"crs":
 formData = { 'ae' : $('#enm').val(),'topic' : $('input[name=topic]').val(),  'date' : $('input[name=date]').val(), 'mode' : $("input[name=mode]:checked").attr("value"), 'type' : $("input[name=type]:checked").attr("value"), 'dur' : $('input[name=dur]').val(),'details' : $('textarea[name=details]').val()};
 break;
case"ptn":
 formData = { 'ae' : $('#enm').val(),'date' : $('input[name=date]').val(), 'topic' : $('input[name=topic]').val(), 'ref' : $('input[name=ref]').val(), 'details' : $('textarea[name=details]').val()};
 break;
case"fnd": 
formData = { 'ae' : $('#enm').val(),'date' : $('input[name=date]').val(), 'fundto' : $('input[name=to]').val(), 'amount' : $('input[name=amount]').val(), 'details' : $('textarea[name=details]').val()};
 break;
case"otr":
formData = { 'ae' : $('#enm').val(), 'date' : $('input[name=date]').val(), 'ref' : $('input[name=ref]').val(), 'details' : $('textarea[name=details]').val()};
 break;
 default: die(); break;
}//sw

$.ajax({
    type: "POST",
    url: 'cadbaury.php', 
    data: formData,
    success: function(data){ 
   if(""!==data){
   alert(data);
   }else{
   alert("Successfully Added");
   window.location="nestle.php";
   }
    }//suc 
    });//aj
});//clk

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
var elems = document.querySelectorAll('.datepicker');
var options={'autoClose':true,'format':"dd mmm yyyy"};
    var instances = M.Datepicker.init(elems, options);

$("input").focus(function() { $("input").characterCounter(); });
  });
</script>
 
</body>
</html>
