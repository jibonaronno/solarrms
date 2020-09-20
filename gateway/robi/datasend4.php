<?php
$host       = "localhost";
/******local*******
$dbusername = "root";
$dbpassword = "";
$dbname     = "btsautomation";*/
$dbhost = 'localhost';
$dbuser = 'powertec_robi';
$dbpass = '2B%w(OyJEJVK'; 
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('powertec_robi');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$bts_id = $_GET['id'];
//$door = $_GET['d'];
//$generator = $_GET['g'];
//$main = $_GET['m'];
//$aviation = $_GET['a'];
$esc = $_GET['e'];
$others = $_GET['o'];
//print_r($_GET); exit;
 //$sql	=	"INSERT INTO bts_status(`bts_id`,`door`,`generator`,`main`,`esc`,`others`) VALUES ('$bts_id','$door','$generator','$main','$esc','$others') ";
 //$insert = mysql_query($sql);
  $sql	=	"UPDATE `bts_status` SET `bts_id` = '$bts_id',`esc` = '$esc',`others` = '$others' WHERE bts_id ='". $bts_id. "'";
$insert = mysql_query( $sql, $conn );	
 if($insert){
 	echo "Data Inserted Successfully!";
 }
 else{
 	echo "Something Goes Wrong, Pleasr Try Again!";
 }
                




?>