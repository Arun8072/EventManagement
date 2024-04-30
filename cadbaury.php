<?php
if("lgt"==$_POST["ae"] || $_SERVER["REQUEST_METHOD"] == "GET"){
setcookie("evusername", "", time()- 60, "/","", 0);
setcookie("evsig", "", time()- 60, "/","", 0);
exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  date_default_timezone_set("Asia/Kolkata");
$exe= new Dbcn();
$exe->conn($exe);
} // - post if 
  function ch($a){
if(""!==$a){return $a;}else{die("Field Empty");}
}//ch
class Dbcn{
 function  conn($exe){
// Create connection
$conn = new  mysqli("localhost", "root","","Event");

 // Check connection
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}


switch($_POST["ae"]){
Case "crs": $exe->crs($conn); break;
Case "fnd": $exe->fnd($conn); break;
Case "jnl": $exe->jnl($conn); break;
Case "ptn": $exe->ptn($conn); break;
Case "otr": $exe->otr($conn); break;
Case "ucrt":$exe->ucrt($conn); break;
Case "viw": $exe->viw($conn); break;
Case "grp": $exe->grp($conn); break;
Case "delacc": $exe->delacc($conn); break;
default: exit();

}//switch

   //end
$conn->close();
}//connect 

protected function viw($conn){
if(isset($_POST['unm'])){
 $n=$_POST['unm'];
}
else{
$n=$_COOKIE["evusername"];
}
$s=$_COOKIE["evsig"];

$sq="Select * from Course where name='$n' and  sig='$s' ";
$result=$conn->query($sq);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
 echo '<div class="card-panel">
<div class="text-center fb"><b>Course</b></div> <div class="two">
<span class="one" ><section><span class="text-left fsb">Topic</span>
<span class="right fr">'.$row["topic"].'</span></section>
<section><span class="text-left fsb">Duration</span>
<span class="right fr">'.$row["duration"].'</span></section></span><span class="one">
<section><span class="text-left fsb">Type</span>
<span class="right fr">'.$row["type"].'</span></section>
<section><span class="text-left fsb">mode</span>
<span class="right fr">'.$row["mode"].'</span></section></span></div>
  <section class="blue-text fr">'.$row["details"].'</section> <div class="text-right text-muted fr">'.$row["date"].'</div> </div>';
    }}//for if

$sq="Select * from Journal where name='$n' and sig='$s' ";
$result=$conn->query($sq);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
 echo '<div class="card-panel">
<div class="text-center fb"><b>Journal</b></div> <div class="two">
<span class="one" ><section><span class="text-left fsb">Topic</span>
<span class="right fr">'.$row["topic"].'</span></section>
</span><span class="one">
<section><span class="text-left fsb">Publication</span>
<span class="right fr">'.$row["publication"].'</span></section>
</span></div>
<section><span class="text-left fsb">Reference Link</span>
<span class="right fr">'.$row["reference"].'</span></section>
  <section class="blue-text fr">'.$row["details"].'</section> <div class="text-right fr text-muted">'.$row["date"].'</div> </div>';
    }}//for if
    
$sq="Select * from Fund where name='$n' and  sig='$s' ";
$result=$conn->query($sq);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
echo '<div class="card-panel">
<div class="text-center fb"><b>Fund</b></div> <div class="two">
<span class="one" ><section><span class="text-left fsb">To</span>
<span class="right fr">'.$row["fundTo"].'</span></section>
</span><span class="one">
<section><span class="text-left fsb">Amount</span>
<span class="right fr">'.$row["amount"].'</span></section>
</span></div>
  <section class="blue-text fr">'.$row["details"].'</section> <div class="text-right fr text-muted">'.$row["date"].'</div> </div>';
    }}//for if
    
$sq="Select * from Pattern where name='$n' and  sig='$s' ";
$result=$conn->query($sq);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
 echo '<div class="card-panel">
<div class="text-center fb"><b>Pattern</b></div> <div class="two">
<span class="one" ><section><span class="text-left fsb">Topic</span>
<span class="right fr">'.$row["topic"].'</span></section>
</span><span class="one">
<section><span class="text-left fsb">Publication</span>
<span class="right fr">'.$row["publication"].'</span></section></span></div>
<section><span class="text-left fsb">Reference Link</span>
<span class="right fr">'.$row["reference"].'</span></section>
  <section class="blue-text fr">'.$row["details"].'</section> <div class="text-right fr text-muted">'.$row["date"].'</div> </div>';
    }}//for if
    
$sq="Select * from Other where name='$n' and  sig='$s' ";
$result=$conn->query($sq);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
 echo '<div class="card-panel">
<div class="text-center fb"><b>Other</b></div> <div class="two">
<span class="one" >
</span><span class="one">
</span></div>
<section><span class="text-left fsb">Reference Link</span>
<span class="right">'.$row["reference"].'</span></section>
  <section class="blue-text fr">'.$row["details"].'</section> <div class="text-right fr text-muted">'.$row["date"].'</div> </div>';
    }}//for if
    
}// own if 

protected function  grp($conn){
 $s=$_COOKIE['evsig'];
/*$ev=["Publication","Pattern","OnlineCourse","Funds"];
foreach($ev as $e){
  $sq="Select distinct a from $e where k='$s' ";
$r=$conn->query($sq);
if ($r->num_rows > 0){
  while($row = $r->fetch_assoc()) {
  echo '<button name="user" class="collection-item form-control-plaintext waves-effect" type="submit"  value="'.$row["a"].'"><span class="left">'.$row["a"].'</span><i class="material-icons secondary-content">send</i></button>';
  
  }}
}*/
$sql="Select name from Journal where sig='$s' union Select name from Fund where sig='$s' union Select name from Pattern where sig='$s' union Select name from Course where sig='$s' union Select name from Other where sig='$s'";
$r=$conn->query($sql);

if ($r->num_rows > 0){
  while($row = $r->fetch_assoc()) {
  echo '<button name="user" class="collection-item form-control-plaintext waves-effect" type="submit"  value="'.$row["name"].'"><span class="left">'.$row["name"].'</span><i class="material-icons secondary-content">send</i></button>';
  }}
  }// grp if 
 
protected function crs($conn){

$a=$_COOKIE['evusername'];
$b=$_COOKIE['evsig']; 
$c=ch($_POST['date']);
$d=ch($_POST['details']);
$e=ch($_POST['topic']);
$f=ch($_POST['dur']);
$g=ch($_POST['type']);
$h=ch($_POST['mode']);

$sql = "INSERT INTO Course (name,sig,date,details,topic,duration,type,mode)VALUES ('$a','$b','$c','$d','$e','$f','$g','$h') ";

if ($conn->query($sql) ===FALSE ) {
echo "\nInsert Error: ". $conn->error;

}
 
}//crs

protected function jnl($conn){

$a=$_COOKIE['evusername'];
$b=$_COOKIE['evsig']; 
$c=ch($_POST['date']);
$d=ch($_POST['details']);
$e=ch($_POST['topic']);
$f=ch($_POST['ref']);
$g=ch($_POST['pbl']);

$sql = "INSERT INTO Journal (name,sig,date,details,topic,reference,publication)VALUES ('$a','$b','$c','$d','$e','$f','$g') ";

if ($conn->query($sql) ===FALSE ) {
    echo "\nInsert Error: ". $conn->error;

}//ins-er


}//jnl

protected function  ptn($conn){

$a=$_COOKIE['evusername'];
$b=$_COOKIE['evsig']; 
$c=ch($_POST['date']);
$d=ch($_POST['details']);
$e=ch($_POST['topic']);
$f=ch($_POST['ref']);


$sql = "INSERT INTO Pattern (name,sig,date,details,topic,reference)VALUES ('$a','$b','$c','$d','$e','$f') ";

if ($conn->query($sql) ===FALSE ) {
    echo "\nInsert Error: ". $conn->error;
 
}//ins-er


}//ptn

protected function  fnd($conn){

$a=$_COOKIE['evusername'];
$b=$_COOKIE['evsig']; 
$c=ch($_POST['date']);
$d=ch($_POST['details']);
$e=ch($_POST['fundto']);
$f=ch($_POST['amount']);

$sql = "INSERT INTO Fund (name,sig,date,details,fundto,amount)VALUES ('$a','$b','$c','$d','$e','$f') ";

if ($conn->query($sql) ===FALSE ) {
    echo "\nInsert Error: ". $conn->error;
 
}//ins-er


}//fnd

protected function otr($conn){

$a=$_COOKIE['evusername'];
$b=$_COOKIE['evsig']; 
$c=ch($_POST['date']);
$d=ch($_POST['details']);
$e=ch($_POST['ref']);

$sql = "INSERT INTO Other (name,sig,date,details,reference)VALUES ('$a','$b','$c','$d','$e') ";

if ($conn->query($sql) ===FALSE ) {
    echo "\nInsert Error: ". $conn->error;
 $exe= new Dbcn();
$exe->tcrt($conn);
}//ins-er


}//otr

protected function tcrt($conn){

$sql = "CREATE TABLE IF NOT EXISTS  Course (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NULL,sig VARCHAR(2) NULL,date VARCHAR(11) NULL,details VARCHAR(225) NULL,topic VARCHAR(30) Null,duration VARCHAR(20) NULL,type VARCHAR(7) NULL,mode VARCHAR(13) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS  Pattern (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NULL,sig VARCHAR(2) NULL,date VARCHAR(11) NULL,details VARCHAR(225) NULL,topic VARCHAR(30) Null,reference VARCHAR(50) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS  Fund (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NULL,sig VARCHAR(2) NULL,date VARCHAR(11) NULL,details VARCHAR(225) NULL,fundTo VARCHAR(30) Null,amount VARCHAR(7) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS  Journal (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR(30) NULL,sig VARCHAR(2) NULL,date VARCHAR(11) NULL,details VARCHAR(225) NULL,topic VARCHAR(30) Null,publication VARCHAR(30) NULL,reference VARCHAR(50) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}
$sql = "CREATE TABLE IF NOT EXISTS Other (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NULL,sig VARCHAR(2) NULL,date VARCHAR(11) NULL,details VARCHAR(225) NULL,reference VARCHAR(50) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}

  }// tcrt if 

protected function ucrt($conn){
$ZName=trim($_POST['euser']);
$pass=MD5(trim($_POST['epass']));
$sig=$_POST['sig'];
 $id=intval($_POST['unqid']);
 $uid=intval("620117104010");
$Name = preg_replace('/[^A-Za-z.\s]/', '', $ZName);
if($ZName!==$Name){
//if any tags present in post of name it exit
die("#_#");
exit();
}

if($id===$uid){
if(strlen($Name)>6 && strlen($pass)>6){

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Staff (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(20) UNIQUE NOT NULL,password VARCHAR(35) NOT NULL,sig INT(1) NOT NULL)";

if ($conn->query($sql) ===FALSE) {
   echo "<br>Error Creating table: " . $conn->error;
}

$sql = "INSERT INTO Staff (username,password,sig)VALUES ('$Name','$pass','$sig') ";

if (isset($_POST['euser']) && $conn->query($sql) ===FALSE ) {
    echo "\nInsert Error: " . $sql . $conn->error;   
}

}//len if

elseif($_POST['euser']=="" || $_POST['epass']=="") {
 echo "\nNULL VALUES NOT PROCESSED";
}
elseif($_POST['euser']<6 || $_POST['epass']<6) {
 echo "Username and Password must be more than 6 characters\n";
}

}//unq
else{
echo "Unique ID is invalid";
}
}//create
 

protected function delacc($conn){
 $user=$_COOKIE['evusername'];
 $sql = "DELETE FROM Staff WHERE username='{$user}'";
if($conn->query($sql)==TRUE){
 setcookie("evusername", "", time()- 60, "/","", 0);
setcookie("evsig", "", time()- 60, "/","", 0);
 }//if
}// del 


  
  }//dbcn class
/*if($_SERVER["REQUEST_METHOD"] == "POST") {
  date_default_timezone_set("Asia/Kolkata");

$exe= new Dbcn();
$exe->conn();
} // - post if */
?>