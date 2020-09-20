<?php
$dbhost       = "localhost";
/******local*******/
//$dbuser = "root";
//$dbpass = "";


$dbuser = 'powertec_robi';
$dbpass = '2B%w(OyJEJVK'; 
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('powertec_robi');

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
//mysql_select_db('btsautomation');

$bts_id = $_GET['bts_id'];
$operations = $_GET['operations'];
if($operations){
	$bts_id = $bts_id;
	$door = $_GET['door'];
	$generator = $_GET['generator'];
	$main = $_GET['main'];
	$aviation = $_GET['aviation'];
	$esc = $_GET['esc'];
	$others = $_GET['others'];
	//echo $bts_id.'-'.$door.'-'.$generator.'-'.$main.'-'.$aviation.'-'.$esc.'-'.$others; exit;
	$sql	=	"UPDATE `bts_status` SET `bts_id` = '$bts_id',`door` = '$door',`generator` = '$generator',`main` = '$main',`aviation` = '$aviation',`esc` = '$esc',`others` = '$others' WHERE bts_id ='". $bts_id. "'";
	$update = mysql_query( $sql, $conn );
	//--------------------log entry--------------//
	
	$sql2	=	"INSERT INTO bts_event_log(`bts_id`,`door`,`generator`,`main`,`aviation`,`esc`,`others`) VALUES ('$bts_id','$door','$generator','$main','$aviation','$esc','$others') ";
	$result = mysql_query( $sql2, $conn );
	if($result){
					//echo "Operation Successful! You will be redirected soon";
					header("Location:/btswise_status_operation.php?bts_id=".$bts_id);
					exit;
					}}?>